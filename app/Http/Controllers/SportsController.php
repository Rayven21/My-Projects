<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $posts=Post::latest()->with(['user','upvotes'])->where('category','Sports')->paginate(10);
        return view('category.posts.sports',['posts' => $posts]);    
    }
}
