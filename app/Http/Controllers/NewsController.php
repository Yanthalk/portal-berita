<?php

namespace App\Http\Controllers;

use App\Services\NewsDataService;
use Illuminate\Support\Facades\Config;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsDataService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index()
    {
        $articles = $this->newsService->getTopHeadlines();
        return view('news.index', compact('articles'));
    }

    public function byKategori($kategori)
    {
        $validKategori = array_keys(config('kategori'));

        if (!in_array($kategori, $validKategori)) {
            abort(404);
        }

        $articles = $this->newsService->getTopHeadlines('id', $kategori);
        $kategoriLabel = config('kategori');

        return view('news.index', [
            'articles' => $articles,
            'kategori' => $kategori,
            'kategoriLabel' => $kategoriLabel,
        ]);
    }
}
