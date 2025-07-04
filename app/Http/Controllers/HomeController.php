<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NewsDataService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Berita;
use App\Models\Komentar;
use Carbon\Carbon;

class HomeController extends Controller
{
    protected $newsService;

    public function __construct(NewsDataService $newsService)
    {
        $this->newsService = $newsService;
    }
    public function index(Request $request)
    {
        Carbon::setLocale('id');

        $page = $request->query('page', 1);
        $perPage = ($page == 1) ? 5 : 10;

        // Ambil dari API
        $rawData = $this->newsService->getTopHeadlines();
        $allowedCategories = array_keys(config('kategori'));
        $apiArticles = collect($rawData)
            ->filter(function ($article) use ($allowedCategories) {
                $articleCategory = is_array($article['category']) ? ($article['category'][0] ?? null) : $article['category'];
                return $articleCategory && in_array($articleCategory, $allowedCategories);
            })
            ->map(function ($article) {
                return [
                    'id'          => $article['article_id'],
                    'title'       => $article['title'] ?? null,
                    'description' => $article['description'] ?? null,
                    'content'     => $article['content'] ?? null,
                    'image_url'   => $article['image_url'] ?? null,
                    'creator'     => $article['creator'][0] ?? null,
                    'country'     => $article['country'] ?? null,
                    'pubDate'     => $article['pubDate'] ?? null,
                    'category'    => is_array($article['category']) ? $article['category'] : [$article['category']],
                    'source'      => 'api'
                ];
            });
        // Ambil dari database lokal
        $localArticles = Berita::with('category')
            ->get()
            ->map(function ($berita) {
                return [
                    'id'          => $berita->news_id,
                    'title'       => $berita->judul,
                    'description' => $berita->konten,
                    'content'     => $berita->isi,
                    'image_url'   => $berita->gambar ? asset('storage/' . $berita->gambar) : null,
                    'creator'     => $berita->penulis,
                    'country'     => $berita->negara,
                    'pubDate'     => $berita->tanggal_publish,
                    'category'    => [$berita->category->nama_kategori ?? 'Umum'],
                    'source'      => 'local'
                ];
            });

        // Gabungkan dan urutkan berdasarkan tanggal publish
        $mergedArticles = $apiArticles
            ->merge($localArticles)
            ->sortByDesc('pubDate')
            ->values();

        $currentItems = $mergedArticles->slice(($page - 1) * $perPage, $perPage)->values();

        $paginated = new LengthAwarePaginator(
            $currentItems,
            $mergedArticles->count(),
            $perPage,
            $page,
            ['path' => url()->current(), 'query' => $request->query()]
        );

        return view('homepage', [
            'articles' => $paginated
        ]);
    }

    public function paginated(Request $request)
    {
        Carbon::setLocale('id');

        $page = $request->query('page', 1);
        $perPage = 20;

        // Ambil data dari API
        $rawData = $this->newsService->getTopHeadlines();
        $allowedCategories = array_keys(config('kategori'));

        $apiArticles = collect($rawData)
            ->filter(function ($article) use ($allowedCategories) {
                $articleCategory = is_array($article['category']) ? ($article['category'][0] ?? null) : $article['category'];
                return $articleCategory && in_array($articleCategory, $allowedCategories);
            })
            ->map(function ($article) {
                return [
                    'id'          => $article['article_id'],
                    'title'       => $article['title'] ?? null,
                    'description' => $article['description'] ?? null,
                    'content'     => $article['content'] ?? null,
                    'image_url'   => $article['image_url'] ?? null,
                    'creator'     => $article['creator'][0] ?? null,
                    'country'     => $article['country'] ?? null,
                    'pubDate'     => $article['pubDate'] ?? null,
                    'category'    => is_array($article['category']) ? $article['category'] : [$article['category']],
                    'source'      => 'api'
                ];
            });

        // Ambil data dari database lokal
        $localArticles = \App\Models\Berita::with('category')
            ->get()
            ->map(function ($berita) {
                return [
                    'id'          => $berita->news_id,
                    'title'       => $berita->judul,
                    'description' => $berita->konten,
                    'content'     => $berita->isi,
                    'image_url'   => $berita->gambar ? asset('storage/' . $berita->gambar) : null,
                    'creator'     => $berita->penulis,
                    'country'     => $berita->negara,
                    'pubDate'     => $berita->tanggal_publish,
                    'category'    => [$berita->category->nama_kategori ?? 'Umum'],
                    'source'      => 'local'
                ];
            });

        // Gabungkan dan urutkan berdasarkan tanggal
        $mergedArticles = $apiArticles
            ->merge($localArticles)
            ->sortByDesc('pubDate')
            ->values();

        // Paginasi manual
        $currentItems = $mergedArticles->slice(($page - 1) * $perPage, $perPage)->values();

        $paginated = new LengthAwarePaginator(
            $currentItems,
            $mergedArticles->count(),
            $perPage,
            $page,
            ['path' => route('homepage.paginated'), 'query' => $request->query()]
        );

        return view('homepage-pagi', [
            'articles' => $paginated
        ]);
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('ubah-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->user_id . ',user_id',
        ]);

        $user->nama = $request->input('nama');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function showProfile()
    {
        $user = Auth::user(); // Ambil user yang login
        return view('profile', compact('user'));
    }

    public function showDetail(Request $request, $id)
    {
        $source = $request->query('source');

        if ($source === 'local') {
            $berita = Berita::where('news_id', $id)->firstOrFail();
            $komentar = Komentar::where('news_id', $id)
                ->orderByDesc('tanggal_komentar')
                ->with('user') // relasi dengan user
                ->get();
            
            return view('view-berita', [
                'judul' => $berita->judul,
                'tanggal' => $berita->tanggal_publish,
                'penulis' => $berita->penulis,
                'gambar' => $berita->gambar ? asset('storage/' . $berita->gambar) : null,
                'konten' => $berita->isi,
                'komentar' => $komentar,
            ]);
        }

        if ($source === 'api') {
            $rawData = $this->newsService->getTopHeadlines();
            $article = collect($rawData)->firstWhere('article_id', $id) ?? collect($rawData)->firstWhere('id', $id);

            if (!$article) abort(404);

            $konten = strlen($article['content'] ?? '') < 30
                ? ($article['description'] ?? 'Tidak tersedia')
                : $article['content'];

            return view('view-berita', [
                'judul'   => $article['title'] ?? 'Judul Tidak Tersedia',
                'tanggal' => \Carbon\Carbon::parse($article['pubDate'])->format('d/m/y, H:i') . ' WIB',
                'penulis' => data_get($article, 'creator.0', 'Anonim'),
                'gambar'  => $article['image_url'] ?? null,
                'konten'  => $konten,
                'komentar' => null,
            ]);
        }

        abort(404);
    }

    public function kirimKomentar(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'komentar' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Komentar::create([
            'komentar' => $request->komentar,
            'tanggal_komentar' => Carbon::now(),
            'user_id' => Auth::user()->user_id,
            'news_id' => $id
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim.');
    }

}