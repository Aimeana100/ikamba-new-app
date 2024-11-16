<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('status', 'active')->get();
        $categories = Category::all();
        $articles = Article::where('status', true)->get();
        return view('admin.dashboard', compact('users', 'categories', 'articles'));
    }
}
