<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontController extends Controller
{
    public function index(): View
    {
        // Fetch home articles based on priority and publication date
        $homeArticles = Article::with('category')
            ->where('priority', '>', 0)
            ->whereNotNull('published_at')
            ->orderBy('priority', 'ASC')
            ->orderBy('published_at', 'DESC')
            ->get();

        // If less than 5 articles are found, fetch additional articles
        if ($homeArticles->count() < 5) {

            // Fetch most viewed articles excluding already fetched ones
            $mostViewedArticles = Article::with('category')
                ->whereNotNull('published_at')
                ->orderBy('views', 'DESC')
                ->take(10) // Fetch only what might be needed
                ->get();

            // Merge and remove duplicates
            $homeArticles = $homeArticles
                ->merge($mostViewedArticles)
                ->unique('id'); // Ensure uniqueness by ID
        }

        // Limit to 5 items
        $homeArticles = $homeArticles->take(5);

        // Get IDs of already fetched articles
        $existingIds = $homeArticles->pluck('id');
        // Fetch latest articles excluding already fetched ones
        $latestStories = Article::with('category')
            ->whereNotNull('published_at')
            ->whereNotIn('id', $existingIds) // Exclude existing articles
            ->latest()
            ->take(9)
            ->get();

        return view('front.index', compact('latestStories', 'homeArticles'));
    }


    public function about(): View
    {
        return view('front.about');
    }

    public function contact(): View
    {
        return view('front.contact');
    }

    public function show($slug): View
    {
        $article = Article::where('slug', $slug)->first();
        return view('front.single', compact('article'));
    }

    public function showCategory($slug): View
    {
//        get category with published articles and authors where slug is equal to the slug passed in the url,

        $category = Category::where('slug', $slug)->first();
        $articles = Article::with(['author'])->where('category_id', $category->id)->where('published_at', '<>', null)->paginate(9);

//        dd($articles);

        $mostPopulars = Article::with('category')->where('published_at', '<>', null)->orderBy('views', 'desc')->take(15)->get();
        $mostViewed = Category::with(['articles' => function ($query) {
            $query->where('published_at', '<>', null);
        }])->where('slug', $slug)->first()->articles->sortByDesc('views')->first();

        return view('front.category', compact('category', 'mostViewed', 'mostPopulars', 'articles'));
    }

    public function single(Request $request, $slug): View
    {
        $article = Article::where('slug', $slug)->first();
        $mostPopulars = Article::with('category')->where('published_at', '<>', null)->orderBy('views', 'desc')->take(15)->get();
        $article->increment('views');
        $shareLinks = \Share::page(
            $request->url(),
            $article->title,
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp();
        return view('front.single', compact('article', 'mostPopulars', 'shareLinks'));
    }

    public function comment(Request $request): RedirectResponse
    {
        $article = Article::where('slug', $request->input('slug'))->first();

        $article->comments()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'comment' => $request->input('comment'),
        ]);
//        if ($request->comment_cookies) {
//            cookie('name', $request->input('name'), time() + 60 * 60 * 24 * 365, '/'); // 365 days
//            cookie('email', $request->input('email'), time() + 60 * 60 * 24 * 365, '/'); // 365 days
//        }
        return back();
        //            ->withCookies(['name' => $request->cookie('name'), 'email' => $request->cookie('email')])

    }

    public function search(Request $request): View
    {
        $pattern = $request->input('pattern');
        $query = $request->query();
        $query['pattern'] = $pattern;
        $mostPopulars = Article::with('category')->orderBy('views', 'desc')->take(15)->get();
        $articles = Article::where('title', 'like', "%$pattern%")->orWhere('description', 'like', "%$pattern%")->orWhere('headlines', 'like', "%$pattern%")->get();
//        return route('front.search.pattern', $pattern)->with(compact('articles', 'mostPopulars', 'pattern'));
        return view('front.search', compact('articles', 'mostPopulars', 'pattern', 'query'));
    }

    public function searchPattern(): View
    {
        return view('front.search');

    }
}
