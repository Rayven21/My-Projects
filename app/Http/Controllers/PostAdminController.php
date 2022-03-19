<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PostAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        //$this->middleware(['auth'])->only(['store','destroy']);
    }
    
    public function index()
    {
        $posts=Post::latest()->with(['user','upvotes'])->paginate(10);
        return view ('layouts.posts.index',[
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('layouts.posts.show',[
            'post' => $post,
        ]);
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request,[
            'body'=> 'required',
            'category'=> 'required',
            'image' => 'mimes:jpg,png,jpeg,bmp,svg,ai|max:10096',
            'category' => 'required'
        ]);

        if($request->has('image')){
            $image = $request->file('image');
            $imagePost = time() . '-' . $request->image->getClientOriginalName();
            
            $destinationPath = public_path('/thumbnail');
            $img = Image::make($image->path());
            $img->resize(800, 800, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imagePost);
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imagePost);
        }

        else{
            $imagePost=NULL;
        }
        
        $post = $request->user()->posts()->create([
            'body' => $request->input('body'),
            'category' => $request->input('category'),
            'filename' => $imagePost
        ]);
        return back()->with('create','Post forwarded to admins for approval');
        
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();

        return back()->with('remove','Deleted post successfully!');
    }

    public function edit($id)
    {
       $post = Post::find($id);
       return view ('layouts.posts.edit')->with('post',$post);
       
    }

    public function update(Request $request, $id, User $user)
    {
        $this->validate($request,[
            'body'=> 'required',
            'category'=> 'required',
            'image' => 'mimes:jpg,png,jpeg,bmp,svg,ai|max:10096'
        ]);

        Post::find($id)->update([
            'body' => $request->input('body'),
            'category' => $request->input('category'),
        ]);

        $posts = Post::latest()->with(['user','upvotes'])->paginate(0);
        
        return redirect('posts')->with('edit','Updated post successfuly!');
        // return view ('layouts.posts.index',[
        //     'posts' => $posts,
        // ]);
    }
}
