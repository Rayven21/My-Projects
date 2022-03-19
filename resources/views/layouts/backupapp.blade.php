<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>E-ULAT</title>

        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        
    </head>
    <body class="bg-white">
        <nav class="p-8 bg-green-500 bg-opacity-50 flex justify-between mb-5">
            <ul class="flex items-center">
                <li>
                    <a href="{{ route('home') }}" class="font-bold p-3">Home</a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" class="font-bold p-3">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('posts') }}" class="font-bold p-3">Post</a>
                </li>
                <li>
                    <a href="{{ route('categories') }}" class="font-bold p-3">Categories</a>
                </li>
            </ul>

            <ul class="flex items-center">
                @auth
                    <li>
                        <a href="../../../users/{{ auth()->user()->name}}/posts" class="p-3">{{ auth()->user()->name}}</a>
                    </li>

                    <li>
                        <form action="{{ route('logout') }}" method="post" class="font-bold p-3 inline">
                        @csrf
                            <button type="submit">Logout<button>
                        </form>
                    </li>   
                @endauth
                @guest
                    <li>
                        <a href="{{ route('login') }}" class="font-bold p-3">Login</a>
                    </li>

                    <li>
                        <a href="{{ route('geolocator') }}" class="font-bold p-3">Register</a>
                    </li>
                @endguest
              
            </ul>
        </nav>

        @yield('content')
    </body>
</html>