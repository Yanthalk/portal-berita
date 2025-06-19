<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NewsDataService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
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

        $rawData = $this->newsService->getTopHeadlines();
        $articles = collect($rawData)
            ->sortByDesc('pubDate')
            ->take(5);

        $currentItems = $articles->slice(($page - 1) * $perPage, $perPage)->values();

        $paginated = new LengthAwarePaginator(
            $currentItems,
            $articles->count(),
            $perPage,
            $page,
            ['path' => url()->current(), 'query' => $request->query()]
        );

        session(['news_articles' => $articles]);

        return view('homepage', [
            'articles' => $paginated
        ]);
    }

    public function paginated(Request $request)
    {
        Carbon::setLocale('id');

        $page = $request->query('page', 1);
        $perPage = 20;

        $rawData = $this->newsService->getTopHeadlines('id', null, 100);
        $articles = collect($rawData)
            ->sortByDesc('pubDate')
            ->values();

        $currentItems = $articles->slice(($page - 1) * $perPage, $perPage)->values();

        $paginated = new LengthAwarePaginator(
            $currentItems,
            $articles->count(),
            $perPage,
            $page,
            ['path' => route('homepage.paginated'), 'query' => $request->query()]
        );

        return view('homepage-pagi', [
            'articles' => $paginated
        ]);
    }
}
