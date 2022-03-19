@extends('layouts.app')

@section('content')
<div class="grid grid-cols-8 gap-4 bg-gray-200">
    <div class="col-start-3 col-span-4 bg-gray-100 rounded-lg shadow-lg p-6 rounded-lg">
        <div class="bg-green-500 text-white p-3 rounded mb-2"><h1 class="text-center text-2xl font-bold">POST APPROVAL</h1></div>
            <div class="flex justify-center">
                <div class="w-full bg-gray-100">
                    @if($posts->count())
                        @foreach($posts as $post)
                            <form action="{{route('approval.approve', $post->id)}}">
                                <div class="w-full mt-4 bg-gray-100 shadow-lg rounded-xl p-6">
                                    <div class="mb-4">
                                    <textarea name="body" hidden id="body" cols="30" rows="4" class="bg-gray border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror">{{$post->body}}</textarea>
                                    <select name="category" hidden id="category" class="rounded-lg px-4 py-2 border-2 border-gray-200 bg-white text-black">
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
                                    @if($post->filename)
                                        <a class="{{$post->filename}}-link" hidden href="{{ asset ('thumbnail/'. $post->filename)}}" data-lightbox="{{$post->filename}}">
                                            <img src="{{ asset ('thumbnail/'. $post->filename)}}" 
                                            class="mb-8 shadow-xl rounded-md img-responsive img-thumbnail ml-auto mr-auto" name="filename" style="width:800px; height:500px;" alt="{{$post->filename}}">
                                        </a>
                                    @endif
                                    <input type="text" hidden name="approval" id="approval" value="Approved">

                                        <a href="{{route('users.posts', $post->user)}}" class="font-bold text-xl">{{$post->user->name}}</a><span class="ml-2 text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
                                           <p class="mb-2"> <span class="mr-3 text-gray-600">{{$post->category}}</span>{{ $post->body }}</p>
                                        @if($post->filename)
                                        <a class="{{$post->filename}}-link" href="{{ asset ('thumbnail/'. $post->filename)}}" data-lightbox="{{$post->filename}}">
                                            <img src="{{ asset ('thumbnail/'. $post->filename)}}" class="mb-8 shadow-xl rounded-md img-responsive img-thumbnail" alt="image">
                                        </a>
                                        @endif
                                         <div class="text-right">
                                                <a href="{{route('approval.destroy', $post)}}"  class="bg-red-500 text-white hover:bg-red-400 hover:text-white px-6 py-2.5 rounded font-medium duration-300">Decline</a>
                                                <button type="submit" class="bg-green-500 text-white hover:bg-green-400 hover:text-white px-6 py-2 rounded font-medium duration-300">Approve</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    @else
                    <div class="col-start-3 col-end-5 col-span-3 bg-gray-100 border rounded-lg shadow-lg p-5 rounded-lg">
                        <p>No post to approve</p>
                    </div>
                    @endif
                <div>
            </div>
        </div>
    </div>
</div>
  

@endsection