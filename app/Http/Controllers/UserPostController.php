<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;


class UserPostController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts()->latest()->with(['user','upvotes'])->where('approval',"Approved")->paginate(0);

        return view ('users.posts.index',[
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    /* public function profile() {
        return view('profile', array('user' => Auth::user()) );
    } */

    public function update_avatar(Request $request) {
        //custom message for error
        $file= [
            'avatar' => 'required',
        ];

        $custoMessage = [
            'required' => 'Select file to proceed',
        ];
        $this->validate($request,$file, $custoMessage);

        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/images/avatars/' . $filename) );

            $user = User::findOrFail(auth()->id());
            $user->avatar = $filename;
            $user->update();
        }

        $posts = $user->posts()->latest()->with(['user','upvotes'])->paginate(0);

        return back()->with('userprofile', 'Updated profile picture successfully!');
        
        // return view ('users.posts.index',[
        //     'user' => $user,
        //     'posts' => $posts,
        // ]);
    }
}
