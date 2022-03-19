@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-6 gap-4 bg-gray-200">
        <div class="col-start-2 col-span-4 bg-gray-100 border rounded-lg shadow-lg p-6 rounded-lg">
            @auth
            <div class="bg-green-500 text-white p-3 rounded mb-4"><h1 class="text-center text-2xl font-bold">EDIT POST</h1></div>
                <form action="{{route('posts.update', $post->id)}}" method="post" class="mb-4" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <a href="{{route('users.posts', $post->user)}}" class="font-bold text-2xl">{{$post->user->name}}</a><span class="ml-2 text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
                    </div> 
                        @if($post->filename)
                            <a class="{{$post->filename}}-link" href="{{ asset ('thumbnail/'. $post->filename)}}" data-lightbox="{{$post->filename}}">
                                <img src="{{ asset ('thumbnail/'. $post->filename)}}" 
                                class="mb-8 shadow-xl rounded-md img-responsive img-thumbnail ml-auto mr-auto" name="filename" style="width:800px; height:500px;" alt="{{$post->filename}}">
                            </a>
                        @endif
                        <p class="font-bold text-m">Caption:</p>
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror">{{$post->body}}</textarea>
                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                        <p class="font-bold text-m mt-2">Category:</p>
                        <div class="grid grid-cols-2 gap-4 place-content-center">
                            <div class="mb-4">
                            <select name="category" id="category" class="rounded-lg px-4 py-2 border-2 border-gray-200 bg-white text-black">
                                <option selected hidden>{{$post->category}}</option>
                                <option value="News">News</option>
                                <option value="General">General</option>
                                <option value="Entertainment">Entertainment</option>
                                <option value="Educational">Educational</option>
                                <option value="Sports">Sports</option>
                                <option value="Gaming">Gaming</option>
                                <option value="Advertisement">Advertisement</option>
                                <option value="Others">Others</option>
                            </select>
                            </div>
                            @error('category')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{$message}}
                                </div>
                            @enderror
                            <div class="text-right"> 
                                <button type="submit" class="bg-green-500 text-white hover:bg-green-400 hover:text-white px-6 py-2 rounded font-medium duration-300">Save</button>
                            </div>
                        </div>
                </form>
            @endauth
        </div>
    </div>
@endsection