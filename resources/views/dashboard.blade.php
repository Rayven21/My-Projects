@extends('layouts.app')

@section('content')         
            @if($posts->count())
            <div class="grid grid-cols-8 gap-8 place-content-center ml-12 mr-12">
                <div class="col-start-2 col-span-3">
                    <table style="width:100%">
                        <thead class="bg-gray-200 text-black font-bold text-2xl">
                            <tr>
                                <th class="col-span-2 bg-green-500 text-white rounded p-3"><h1>TOP 5 MOST UPVOTED POSTS</h1></th>
                            </tr> 
                        </thead>
                        <tbody class="flex flex-col items-center justify-between overflow-y-scroll overscroll-none w-full" style="height: 80vh;">
                            @foreach($posts->sortByDesc('upvotes')->take(5) as $post)
                                <tr class="w-full mt-4 bg-gray-100 shadow-lg rounded-xl p-6">
                                    <td>
                                    <div class="mb-4">
                                        <a href="{{route('users.posts', $post->user)}}" class="font-bold text-xl">{{$post->user->name}}</a><span class="ml-2 text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
                                           <p class="mb-2"> <span class="mr-3 text-gray-600">{{$post->category}}</span>{{ $post->body }}</p>
                                        @if($post->filename)
                                        <a class="{{$post->filename}}-link" href="{{ asset ('thumbnail/'. $post->filename)}}" data-lightbox="{{$post->filename}}">
                                            <img src="{{ asset ('thumbnail/'. $post->filename)}}" class="mb-8 shadow-xl rounded-md img-responsive img-thumbnail" alt="image">
                                        </a>
                                        @endif
                                        <div class="flex items-center">
                                            @auth
                                            <!--FOR UPVOTE-->
                                            @if (!$post->downvotedBy(auth()->user())) 
                                                @if (!$post->upvotedBy(auth()->user())) 
                                                    <form action="{{route('posts.upvotes',$post)}}" method="post" class="mr-3">
                                                        @csrf 
                                                        <button type="submit" class="bg-transparent text-sm hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-2 border-solid border-2 border-gray-500 hover:border-transparent rounded duration-300 ease-in-out">Upvote</button>
                                                    </form>
                                                @else
                                                    <form action="{{route('posts.returnupvote',$post)}}" method="post" class="mr-3">
                                                        @csrf 
                                                        @method('DELETE')
                                                        <button type="" class="bg-blue-500 text-sm hover:bg-blue-700 text-white font-semibold hover:text-white py-2 px-2 border-double border-4 border-gray-500 hover:border-transparent rounded duration-300 ease-in-out">Upvoted</button>
                                                    </form>
                                                @endif
                                            @endif
                                            <!--FOR DOWNVOTE-->
                                            @if (!$post->upvotedBy(auth()->user())) 
                                                @if (!$post->downvotedBy(auth()->user())) 
                                                    <form action="{{route('posts.downvotes',$post)}}" method="post" class="mr-3">
                                                        @csrf 
                                                        <button type="submit" class="bg-transparent text-sm hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-2 border-solid border-2 border-gray-500 hover:border-transparent rounded duration-300 ease-in-out">Downvote</button>
                                                    </form>
                                                @else
                                                    <form action="{{route('posts.returndownvote',$post)}}" method="post" class="mr-3">
                                                        @csrf 
                                                        @method('DELETE')
                                                            <button type="" class="bg-red-500 text-sm hover:bg-red-700 text-white font-semibold hover:text-white py-2 px-2 border-double border-4 border-gray-500 hover:border-transparent rounded duration-300 ease-in-out">Downvoted</button>
                                                    </form>
                                                @endif
                                            @endif
                                            <a href="{{route('posts.show', $post)}}" class="bg-transparent text-sm hover:bg-gray-700 text-gray-700 font-semibold hover:text-white py-2 px-2 border-solid border-2 border-gray-500 hover:border-transparent rounded duration-300 ease-in-out">Comment</a>
                                            @endauth
                                            <div class="text-blue-500 ml-1 mr-1"> {{$post->upvotes->count()}}</div><span class="mr-2.5">{{Str::plural('upvote',$post->upvotes->count())}}</span>
                                            <div class="text-red-500 mr-1"> {{$post->downvotes->count()}}</div><span> {{Str::plural('downvote',$post->downvotes->count())}}</span>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-start-5 col-end-8">
                    <table style="width:100%">
                        <thead class="bg-gray-200 text-black font-bold text-2xl">
                            <tr>
                                <th class="col-span-2 bg-green-500 text-white rounded p-3 mb-4"><h1>TOP CONTRIBUTORS</h1></th>
                            </tr>
                        </thead>
                        <tbody class="flex flex-col items-center justify-between overflow-y-scroll overscroll-none w-full" style="height: 80vh;">
                            @if($post->user->receivedUpvotes->count()- $post->user->receivedDownvotes->count() >= 0 )
                                        <tr class="w-full mt-4 bg-gray-100 shadow-lg rounded-xl p-6">
                                            <td>
                                                @foreach($posts->unique('user_id') as $post)
                                                    <a href="{{route('users.posts', $post->user)}}" class="font-bold text-xl">{{$post->user->name}}</a>
                                                    <p class="mb-4"> <span class="mr-3 text-gray-600">Merit Gained: </span><span class="text-green-700 font-semibold">{{ $post->user->getKarma() }}</span></p>
                                                @endforeach
                                            </td>  
                                        </tr>
                            @endif
                        </tbody>
                    </table>   
                </div>                 
            </div>
            @else
            <div class="grid grid-cols-6 grap-4 bg-gray-200">
            <div class="col-start-2 col-end-6 col-span-3 bg-gray-100 border rounded-lg shadow-lg p-6 rounded-lg">
                <div>
        <p>There are no posts to see as of yet</p>
    </div>
            </div>
        </div>
            @endif

@endsection