<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Services\NewsDataService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BeritaController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->query('query');
        if (!$query || strlen($query) < 2) {
            return response()->json([]);
        }


        $localResults = Berita::where('judul', 'LIKE', "%{$query}%")
            ->limit(5)
            ->get()
            ->map(function ($berita) {
                return [
                    'source' => 'local',
                    'id' => $berita->news_id,
                    'judul' => $berita->judul,
                ];
            });


        $newsService = new NewsDataService();
        $apiResponse = $newsService->search($query);
        $apiResults = [];


        if (isset($apiResponse['results'])) {
            $apiResults = collect($apiResponse['results'])
                ->take(5)
                ->map(function ($article, $index) {
                    return [
                        'source' => 'api',
                        'id' => $index,
                        'judul' => $article['title'],
                        'url' => $article['link'],
                    ];
                });
        }


        $results = $localResults->merge($apiResults);
        return response()->json($results);
    }

    public function cari(Request $request)
    {
        $query = $request->input('query');

        $localResults = Berita::where('judul', 'LIKE', "%{$query}%")
            ->get()
            ->map(function ($berita) {
                return [
                    'source' => 'local',
                    'judul' => $berita->judul,
                    'id' => $berita->news_id,
                    'description' => $berita->konten,
                    'image_url' => $berita->gambar ? asset('storage/' . $berita->gambar) : null,
                    'pubDate' => $berita->tanggal_publish,
                    'category' => [$berita->category->nama_kategori ?? 'Umum'],
                    'url' => route('view-berita', ['id' => $berita->news_id, 'source' => 'local']),
                ];
            });

        $newsService = new NewsDataService();
        $apiResponse = $newsService->search($query);
        $apiResults = [];

        if (isset($apiResponse['results'])) {
            $apiResults = collect($apiResponse['results'])
                ->take(10)
                ->map(function ($article) {
                    return [
                        'source' => 'api',
                        'judul' => $article['title'],
                        'id' => $article['article_id'] ?? uniqid(),
                        'description' => $article['description'] ?? '',
                        'image_url' => $article['image_url'] ?? asset('images/post-berita.jpg'),
                        'pubDate' => $article['pubDate'] ?? now(),
                        'category' => is_array($article['category']) ? $article['category'] : [$article['category'] ?? 'Umum'],
                        'url' => route('view-berita', ['id' => $article['article_id'] ?? uniqid(), 'source' => 'api']),
                    ];
                });
        }

        $combined = $localResults->concat($apiResults);

        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $combined->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $paginator = new LengthAwarePaginator(
            $currentItems,
            $combined->count(),
            $perPage,
            $currentPage,
            ['path' => url()->current(), 'query' => $request->query()]
        );

        return view('cari', [
            'query' => $query,
            'results' => $paginator
        ]);
    }

}
