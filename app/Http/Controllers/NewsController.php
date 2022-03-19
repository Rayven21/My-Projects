<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $posts=Post::latest()->with(['user','upvotes'])->where('category','News')->paginate(10);
        return view('category.posts.news',['posts' => $posts]);    
    }
}
