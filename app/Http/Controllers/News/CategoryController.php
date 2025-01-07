<?php

namespace Tests\storage\annotations\OpenApi\Products;

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(Request $request): View
    {
        $categoryStatus = $request->status;
        $is_main = $categoryStatus === 'main-category';

        $categories = Category::Where('is_active', true)->with(['articles', 'children']);

        if ($categoryStatus && $categoryStatus !== 'all') {
            $categories = $categories->where('is_main', $is_main);
        } else {
            $is_main = 'all';
        }
        $categories = $categories->get();
        return view('admin.category.index', compact('categories', 'is_main'));
    }

    public function create(Request $request): View
    {
        $mainCategory = Category::Where(['is_main' => true])->get();

        return view('admin.category.create', compact('mainCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request): RedirectResponse
    {
        if ($request->input('is_main') == 1 && $request->input('parent_category')) {
            return redirect()->back()->with('error', 'Main category cannot have parent category');
        }

        $category = Category::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'is_main' => $request->input('is_main'),
            'parent_id' => $request->input('parent_category') ?? null,
        ]);

        return redirect()->route('admin.category')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category;

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $category = Category::with('articles')->find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $category = Category::findOrFail($request->input('id'));
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|max:255|unique:categories,slug,' . $category->id,
        ]);

        $category->update($request->all());

        return redirect()->route('admin.category')
            ->with('success', 'Category Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(null, 204);
    }

    public function delete(int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
//        $category->is_active = false;
//        $category->save();
        $category->delete();
        return redirect()->route('admin.category')
            ->with('success', 'Category deleted successfully.');

    }
}
