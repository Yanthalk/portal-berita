<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NewsDataService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\Berita;
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
        $rawData = $this->newsService->getTopHeadlines('id', null, 100);
        $allowedCategories = array_keys(config('kategori'));

        $apiArticles = collect($rawData)
            ->filter(function ($article) use ($allowedCategories) {
                $articleCategory = is_array($article['category']) ? ($article['category'][0] ?? null) : $article['category'];
                return $articleCategory && in_array($articleCategory, $allowedCategories);
            })
            ->map(function ($article) {
                return [
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
}
