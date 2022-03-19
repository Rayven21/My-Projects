<?php

namespace App\Http\Controllers;

use App\Models\Post;
//use App\Mail\PostUpvote;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;

class PostDownvoteController extends Controller
{
    public function store(Post $post, Request $request)
    {
        if($post->downvotedBy($request->user())){
            return response(null,409);
        }

        $post->downvotes()->create([
            'user_id'=> $request->user()->id,
        ]);

       /* if (!$post->downvotes()->onlyTrashed()->where('user_id', $request->user()->id)->count()) {
            Mail::to($post->user)->send(new PostDownvote(auth()->user(), $post));
        }*/

        return back();
    }


    public function destroy(Post $post, Request $request)
    {
        $request->user()->downvotes()->where('post_id',$post->id)->delete();

        return back();
    }
}
