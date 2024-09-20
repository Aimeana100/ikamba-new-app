<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
//        get the categories that are not main and has children that has at least one article published
//        $categories = Category::with(['children.articles'])->where('is_main', 1)
//            ->whereHas('children.articles', function ($query) {
//                $query->where('archive', 0)->where('published_at', '<>', null);
//            })
//            ->get();
        $categories = Category::where('is_main', 1)
            ->whereHas('children', function ($childQuery) {
                $childQuery->whereHas('articles', function ($articleQuery) {
                    $articleQuery->where('archive', 0)
                        ->whereNotNull('published_at');
                });
            })
            ->with(['children' => function ($childQuery) {
                $childQuery->whereHas('articles', function ($articleQuery) {
                    $articleQuery->where('archive', 0)
                        ->whereNotNull('published_at');
                });
            }])
            ->get();
        return view('layouts.guest', compact('categories'));
    }
}