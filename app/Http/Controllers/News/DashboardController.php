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
        $users = User::all();
        $categories = Category::all();
        $articles = Article::all();
        return view('admin.dashboard', compact('users', 'categories', 'articles'));
    }
}
