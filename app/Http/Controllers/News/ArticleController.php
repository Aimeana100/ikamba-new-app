<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Imbere News API Documentation",
 *     description="API documentation for IKAMBA News App",
 * )
 */
class ArticleController extends Controller
{

    public function index(Request $request): View
    {
        $searchTerm = $request->input('search') || '';
        $articles = Article::with('tags', 'category', 'author')->where('status', true);
        if (Auth::user()->isJournalist()) {
            $articles = $articles->where('user_id', Auth::user()->id);
        }
        if ($request->has('search')) {
            $articles = $articles->where('title', 'like', '%' . $searchTerm . '%')
                ->orWhere('description', 'like', '%' . $searchTerm . '%')
                ->orWhere('headlines', 'like', '%' . $searchTerm . '%')
                ->orWhere('caption', 'like', '%' . $searchTerm . '%');
        }
        $articles = $articles->orderBy('priority', 'asc')->get();

//        $articles = Article::with('tags', 'category', 'author')->where('status', true)->get();
        return view('admin.article.index', compact('articles', 'searchTerm'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $categories = Category::where('is_active', true)->where('is_main', false)->get();
        return view('admin.article.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'headlines' => 'required|string',
            'priority' => 'required|integer',
//            'tags' => 'array|exists:tags,id',
        ]);

        date_default_timezone_set('Africa/kigali');

        $article = new Article($request->all());
        $article->user_id = Auth::user()->id;
        $this->extracted($request, $article);
        if ($request->has('priority')) {
            Article::where('priority', $request->input('priority'))->update(['priority' => 0]);
        }
        $article->save();
//        $article->tags()->attach($request->tags);

        return redirect()->route('admin.article');
    }

    /**
     * @OA\Get(
     *     path="/api/articles/{id}",
     *     operationId="getArticleById",
     *     tags={"Articles"},
     *     summary="Get article by ID",
     *     description="Returns a single article",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=404, description="Article not found"),
     *     @OA\Response(response=401, description="Unauthorized"),
     * )
     */
    public function show(Article $article)
    {
        return $article->load('user', 'category', 'tags', 'comments');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article, $slug)
    {
        $article = Article::where('slug', $slug)->with('category', 'tags')->firstOrFail();
        $categories = Category::all();
        return view('admin.article.edit', compact('article', 'categories'));
    }

    public function review(Article $article, $slug): View
    {
        $article = Article::where('slug', $slug)->with('category', 'tags')->firstOrFail();
        $categories = Category::all();
        return view('admin.article.review', compact('article', 'categories'));
    }

    public function publish(Article $article, $slug): RedirectResponse
    {
        $article = Article::where('slug', $slug)->with('category', 'tags')->firstOrFail();
        $article->published_at = now();
        $article->save();
        return redirect()->route('admin.article');

    }

    /**
     * @OA\Put(
     *     path="/api/articles/{id}",
     *     operationId="updateArticle",
     *     tags={"Articles"},
     *     summary="Update an existing article",
     *     description="Updates an existing article",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *     ),
     *     @OA\Response(response=200, description="Article updated successfully"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=401, description="Unauthorized"),
     * )
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'headlines' => 'required|string',
            'priority' => 'required|integer',
//            'tags' => 'array|exists:tags,id',
        ]);

        date_default_timezone_set('Africa/kigali');

        $article = Article::findOrFail($request->input('id'));
        $this->extracted($request, $article);
        if ($request->has('priority')) {
            Article::where('priority', $request->input('priority'))->update(['priority' => 0]);
        }
        $article->update($request->all());
        return redirect()->route('admin.article');
    }

    public function destroy(Article $article)
    {
        // $this->authorize('delete', $article);

        $article->delete();
        return response()->json(null, 204);
    }


    public function uploadImage(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->move(base_path('public/uploads/images'), $filename);

            $url = asset('/uploads/images/' . $filename);

            return response()->json([
                'url' => $url
            ]);
        } else {
            return response()->json([
                'message' => 'No file uploaded'
            ], 400);
        }
    }

    public function delete(int $id): RedirectResponse
    {
        $article = Article::findOrFail($id);
        $article->status = false;
        $article->save();
        return redirect()->route('admin.article')
            ->with('success', 'Article deleted successfully.');
    }

    /**
     * @param Request $request
     * @param $article
     * @return void
     */
    public function extracted(Request $request, $article): void
    {
        $article->slug = Str::slug($request->input('title', '-'));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();

            // upload in public for when in development and in public_html in production using env variables

            $fileToUpload = env('APP_ENV') == 'local' ? 'public' : '../public_html';

            $image->move(base_path($fileToUpload . '/uploads/images'), $filename);
            $article->image = $filename;
        }
    }
}
