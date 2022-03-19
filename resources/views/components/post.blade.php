@props(['post' => $post])

<div class="mb-4">
    @can('delete', $post)
        <form action="{{route('posts.destroy', $post)}}" method="post">
            @csrf 
            @method('DELETE')
            <div class="relative float-right dropdown">
                <span class="rounded-md shadow-sm">
                <button class="px-2 py-2 text-sm font-lg leading-5 text-gray-700 transition duration-150 ease-in-out bg-gray-100 hover:text-green-500 focus:outline-none hover:bg-gray-200 rounded-full focus:border-blue-300 focus:shadow-outline-green active:bg-black active:text-gray-800" 
                type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-117">
                    <span></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                      </svg>
                    </button></span>
                <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
                <div class="absolute right-196 w-36 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                    <div class="py-1">
                        
                    <a href="{{route('posts.edit', $post->id)}}" tabindex="0" class="text-gray-700 flex  w-full px-4 py-2 text-sm leading-5 text-left hover:bg-green-200 hover:text-black transition duration-300" role="menuitem" >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                          </svg>
                           &nbsp Edit</a></div>
                    <div class="py-1">
                        
                        <button type="submit" tabindex="1" class="text-red-500 left-0 flex  w-full px-4 py-2 text-sm leading-5 text-left hover:bg-red-400 hover:text-black transition duration-300 delete-confirm"  role="menuitem" ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg> &nbsp Remove</button></div>
                </div>
                </div>
            </div>


<style>
.dropdown:focus-within .dropdown-menu {
  opacity:1;
  transform: translate(0) scale(1);
  visibility: visible;
}
    </style>
        </form>     
    @endcan
    <a href="{{route('users.posts', $post->user)}}" class="font-bold text-xl">{{$post->user->name}}</a><span class="ml-2 text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
       <p class="mb-2"> <span class="mr-3 text-gray-600 font-light">{{$post->category}}</span>{{ $post->body }}</p>
    @if($post->filename)
    <a class="{{$post->filename}}-link" href="{{ asset ('thumbnail/'. $post->filename)}}" data-lightbox="{{$post->filename}}">
        <img src="{{ asset ('thumbnail/'. $post->filename)}}" 
        class="mb-8 shadow-xl rounded-md img-responsive img-thumbnail" alt="{{$post->filename}}">
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
       {{--  <div class="text-blue-500 ml-1 mr-1"> {{$post->upvotes->count()}}</div><span class="mr-2.5">{{Str::plural('upvote',$post->upvotes->count())}}</span>
        <div class="text-red-500 mr-1"> {{$post->downvotes->count()}}</div><span> {{Str::plural('downvote',$post->downvotes->count())}}</span> --}}
        @if($post->getNetVote() >= 0 )
            <div class="text-blue-500 ml-1 mr-1"> {{$post->getNetVote()}}</div><span class="mr-2.5">{{Str::plural('vote',$post->getNetVote())}}</span>
        @else
        <div class="text-red-500 ml-1 mr-1"> {{$post->getNetVote()}}</div><span class="mr-2.5">{{Str::plural('vote',$post->getNetVote())}}</span>
        @endif
    </div>
</div>