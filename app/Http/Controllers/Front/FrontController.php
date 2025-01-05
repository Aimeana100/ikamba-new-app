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
        $latestStories = Article::with('category')->where('published_at', '<>', null)->latest()->take(6)->get();
        $homeArticles = Article::with('category')->where('priority', '<=', 5)->Where('published_at', '<>', null)->orderBy('created_at', 'ASC')->get(); // select articles where priority is 1 to 5  and order by updated_at
        if ($homeArticles->count() < 5) {
//        find the latest and most viewed articles that are not fetched in homeArticles and append to homeArticles to try filling 5 items in the array and make sure the array doesn't exceed 5 items
            $latestArticles = Article::with('category')->where('published_at', '<>', null)->latest()->get();
            $mostViewedArticles = Article::with('category')->where('published_at', '<>', null)->orderBy('views', 'desc')->get();
            $articles = $latestArticles->merge($mostViewedArticles)->unique();
            $homeArticles = $homeArticles->merge($articles)->unique();
        }
//        take first 5 items in the array
        $homeArticles = $homeArticles->take(5);

//        dd($homeArticles);

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
