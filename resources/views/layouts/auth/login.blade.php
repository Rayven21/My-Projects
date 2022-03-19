@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg min-w-max">
        @if(session('status'))
        <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
         {{ session('status') }}
        </div>
           
        @endif
        <div class="bg-white border border-green-500 p-6 rounded-lg">
        <h1 class="mb-6 text-left font-bold text-lg">Sign in</h1>
      
                    <form action="{{ route('login') }}" method="post">
                    @csrf
                        <div class="mb-4">
                            <label for="email" class="sr-only">Email</label>
                            <input type="text" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:bg-white @error('email') border-red-500 @enderror" value="{{ old('email')}}">
                            @error('email')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="password" placeholder="Your password" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:bg-white @error('password') border-red-500 @enderror">
                            @error('password')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center">
                                <input type="checkbox" name="remember" id="remember" class="mr-2">
                                <label for="remember">Remember me</label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="bg-green-500 text-white px-4 py-3 mb-5 rounded font-medium w-full hover:bg-green-400 duration-300">Sign in</button>
                        </div>
                        <div class="text-center">
                            <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="{{ route('geolocator') }}">
                                Create an Account!
                            </a>
                        </div>
                    </form>
                </div>
        </div>
    </div>
@endsection