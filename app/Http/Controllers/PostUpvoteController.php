<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostUpvote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostUpvoteController extends Controller
{
    public function store(Post $post, Request $request)
    {
        if($post->upvotedBy($request->user())){
            return response(null,409);
        }

        $post->upvotes()->create([
            'user_id'=> $request->user()->id,
        ]);

        if (!$post->upvotes()->onlyTrashed()->where('user_id', $request->user()->id)->count()) {
            Mail::to($post->user)->send(new PostUpvote(auth()->user(), $post));
        }

        //$user = auth()->user();
        return back();
    }

    /* public function countDecrementWithUpdate($id = 1)

    {
    	static::where('id',$id)->update(['count' => DB::raw('count-1')]);;

    } */


    public function destroy(Post $post, Request $request)
    {
        $request->user()->upvotes()->where('post_id',$post->id)->delete();

        return back();
    }
}
