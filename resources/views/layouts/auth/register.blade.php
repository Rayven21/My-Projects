@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg min-w-max">
            <div class="bg-white border border-green-500 p-6 rounded-lg">
                <h1 class="mb-6 text-left font-bold text-lg">Create your Account</h1>
            <form action="{{ route('register') }}" method="post">
            @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:bg-white @error('name') border-red-500 @enderror" value="{{ old('name')}}">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:bg-white @error('username') border-red-500 @enderror" value="{{ old('username')}}">
                    
                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
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
                    <input type="password" name="password" id="password" placeholder="Choose a password" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:bg-white @error('password') border-red-500 @enderror">
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password again</label>
                    <input type="password" name="password_confirmation" id="password" placeholder="Repeat your password" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:bg-white @error('password_confirmation') border-red-500 @enderror">
                    @error('password_confirmation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                    <div>
                        <button type="submit" class="bg-green-500 text-white px-4 py-3 rounded font-medium w-full hover:bg-green-400 duration-300">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection