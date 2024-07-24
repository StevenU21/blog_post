<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories_count = Category::count();
        $posts_count = Post::count();
        $tags_count = Tag::count();
        $users_count = User::count();
        return view('dashboard', compact('categories_count', 'posts_count', 'tags_count', 'users_count'));
    }
}
