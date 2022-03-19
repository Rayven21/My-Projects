@extends('layouts.app')

@section('content')
<div class="grid grid-cols-8 gap-4 bg-gray-200">
    <div class="col-start-3 col-span-4 bg-gray-100 rounded-lg shadow-lg p-6 rounded-lg">
        <div class="bg-green-500 text-white p-3 rounded mb-2"><h1 class="text-center text-2xl font-bold">SPORTS</h1></div>
            <div class="flex justify-center">
                <div class="p-4 w-11/12">
                    @if($posts->count())
                        @foreach($posts as $post)
                        <div class="col-start-3 col-end-5 col-span-4 shadow-lg rounded-lg p-4 mb-4">
                            <x-post :post="$post"/>
                        </div>
                        @endforeach

                        {{$posts->links()}}
                    @else
                    <div class="col-start-3 col-end-5 col-span-4 shadow-lg rounded-lg p-4 mb-4">
                        <p class="text-center font-medium text-lg">There are no posts</p>
                    </div>
                    @endif
                </div>
            </div>
    </div>
</div>
@endsection