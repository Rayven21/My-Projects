<?php

namespace App\Http\Controllers;

use App\Mail\PostUpvote;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Post $post)
    {
        /* $posts=Post::latest()->with(['user','upvotes'])->get(); */
        $posts = Post::all()->sortByDesc(function($post) { return $post->user->getKarma(); })->where('approval',"Approved");
        return view ('dashboard',['posts'=>$posts]);

    }
    
}
