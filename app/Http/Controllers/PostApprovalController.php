<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $posts=Post::latest()->with(['user','upvotes'])->where('approval',NULL)->paginate(10);
        return view ('admin.post_approval',[
            'posts' => $posts
        ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();

        return back();
    }

    public function update(Request $request, $id, User $user)
    {
        //dd($request);
        $this->validate($request,[
            'body'=> 'required',
            'category'=> 'required',
            'image' => 'mimes:jpg,png,jpeg,bmp,svg,ai|max:10096'
        ]);

        Post::find($id)->update([
            'body' => $request->input('body'),
            'category' => $request->input('category'),
            'approval'=> $request->input('approval'),
        ]);

        $posts = Post::latest()->with(['user','upvotes'])->paginate(0);
        
        return back();
        // return view ('layouts.posts.index',[
        //     'posts' => $posts,
        // ]);
    }
}
