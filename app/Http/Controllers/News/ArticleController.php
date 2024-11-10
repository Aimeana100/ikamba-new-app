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
 *     title="IKAMBA News API Documentation",
 *     description="API documentation for IKAMBA News App",
 * )
 */
class ArticleController extends Controller
{

    /**
     * @OA\Schema(
     *     schema="Article",
     *     type="object",
     *     title="Article",
     *     required={"title", "body", "category_id"},
     *     @OA\Property(property="id", type="integer", example=1),
     *     @OA\Property(property="title", type="string", example="Sample Article Title"),
     *     @OA\Property(property="description", type="string", example="This is the body of the article."),
     *     @OA\Property(property="user_id", type="integer", example=1),
     *     @OA\Property(property="category_id", type="integer", example=1),
     *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
     *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
     *     @OA\Property(property="tags", type="array", @OA\Items(type="string")),
     * )
     */


    //  @OA\Property(property="comments", type="array", @OA\Items(ref="#/components/schemas/Comment"))

    /**
     * @OA\Get(
     *     path="/api/articles",
     *     operationId="getArticlesList",
     *     tags={"Articles"},
     *     summary="Get list of articles",
     *     description="Returns list of articles",
     *     @OA\Response(
     *         response=200,
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Article")),
     *         description="Successful operation",
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=401, description="Unauthorized"),
     * )
     */

    public function index(): View
    {

        $articles = Article::with('tags', 'category', 'author')->where('status', true)->get();

        return view('admin.article.index', compact('articles'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $categories = Category::all();
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
            $image->move(base_path('public/uploads/images'), $filename);
            $article->image = $filename;
        }
    }
}
