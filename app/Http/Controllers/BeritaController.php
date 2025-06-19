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
                    'url' => route('berita.show', $berita->news_id)
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

        $combined = $localResults->concat($apiResults);

        $perPage = 5;
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

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('view-berita', compact('berita'));
    }
}
