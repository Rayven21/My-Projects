<!DOCTYPE html>
<html lang="en">
    <link rel="icon" type="image/x-icon" href="{{asset('images/eulat.ico')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>E-Ulat</title>
        <link rel="stylesheet" href="{{asset('css/lightbox.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

     
        <style>
       
        .swal-icon{
            margin-left: 110px;
        }
       
        .swal-title{
            font-weight:bold;
        }
        .swal-button{
            padding: 10px 20px;
            border-radius: 2px;
            background-color: #4169e1;
            font-size: 12px;
        }
        .swal-button:hover{
            padding: 10px 20px;
            border-radius: 2px;
            color: #4169e1;
            font-size: 12px;
        }
        </style>
        
    </head>
    
    <body class="bg-gray-200">

        <!-- E-Ulat Navigation Bar -->
        <nav class="bg-gray-200">
            <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
        
                <div class="flex space-x-4">
                    <!-- Logo -->
                    <div>
                        <a href="{{ route('home') }}" class="flex items-center py-5 px-2 text-gray-800 hover:text-gray-1000">
                        <svg class="h-6 w-6 mr-1 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                            <span class="font-bold hover:text-green-500 duration-300 ease-in-out">E-Ulat</span>
                        </a>
                    </div>
            
                    <!-- Primary navigation bar -->
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="{{ route('home') }}" class="py-5 px-3 text-gray-800 hover:text-green-500 duration-300">Home</a>
                        <a href="{{ route('dashboard') }}" class="py-5 px-3 text-gray-800 hover:text-green-500 duration-300">Dashboard</a>
                        <a href="{{ route('posts') }}" class="py-5 px-3 text-gray-800 hover:text-green-500 duration-300">Post</a>
                        <a href="{{ route('categories') }}" class="py-5 px-3 text-gray-800 hover:text-green-500 duration-300">Categories</a>
                        @auth
                        @if(auth()->user()->email == 'admin@gmail.com')
                            <a href="{{ route('approval') }}" class="py-5 px-3 text-gray-800 hover:text-green-500 duration-300">Post Approval</a>
                        @endif
                        @endauth
                     
                    </div>
                </div>
                


                @auth
                <div class="hidden md:flex items-center space-x-1">
                    <a href="../../../users/{{ auth()->user()->name}}/posts" class="py-5 px-3 hover:text-green-500 duration-300">{{ auth()->user()->name}}</a>
                    <form action="{{ route('logout') }}" method="post" class="font-bold p-3 inline">
                        @csrf
                            <button type="submit" class="hover:text-green-500 duration-300">Logout<button>
                    </form>
                </div>
                @endauth

                <!-- Primary navigation bar/For Guests -->
                @guest
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('login') }}" class="py-5 px-3 hover:text-green-500 duration-300">Login</a>
                    <a href="{{ route('geolocator') }}" class="py-2 px-3 bg-green-400 hover:bg-green-300 text-green-900 hover:text-green-800 rounded transition duration-300">Signup</a>
                </div>
                @endguest

                <!-- For mobile button -->
                <div class="md:hidden flex items-center">
                    <button class="mobile-menu-button">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
        
            </div>
            </div>
        
            <!-- For Mobile menu -->
            <div class="mobile-menu hidden md:hidden">
            <a href="{{ route('home') }}" class="hover:text-green-500 duration-300  block py-2 px-4 text-sm hover:bg-gray-200">Home</a>
            <a href="{{ route('dashboard') }}" class="hover:text-green-500 duration-300  block py-2 px-4 text-sm hover:bg-gray-200">Dashboard</a>
            <a href="{{ route('posts') }}" class="hover:text-green-500 duration-300  block py-2 px-4 text-sm hover:bg-gray-200">Post</a>
            <a href="{{ route('categories') }}" class="hover:text-green-500 duration-300 block py-2 px-4 text-sm hover:bg-gray-200">Categories</a>
            @auth
            <a href="../../../users/{{ auth()->user()->name}}/posts" class="hover:text-gray-500 duration-300 block py-2 px-4 text-sm hover:bg-gray-200 text-green-500">{{ auth()->user()->name}}</a>
            <form action="{{ route('logout') }}" method="post" class="block py-2 px-4 text-sm hover:bg-gray-200 duration-300 ">
                @csrf
                    <button type="submit" class="hover:text-gray-500 duration-300 text-red-500">Logout<button>
            </form>
            @endauth

            @guest
            <a href="{{ route('login') }}" class="block py-2 px-4 text-sm hover:text-gray-500 duration-300 text-green-500">Login</a>
            <a href="{{ route('geolocator') }}" class="block py-2 px-4 text-sm hover:text-gray-500 duration-300 text-green-500">Register</a>
            @endguest
            </div>
        </nav>
        <script>
            // grab everything
            const btn = document.querySelector("button.mobile-menu-button");
            const menu = document.querySelector(".mobile-menu");
    
            // add event listeners
            btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
            });
        </script>
        
        <br>
    
        
        @yield('content')
        <script src="{{asset('js/lightbox-plus-jquery.js')}}"></script>
        <script src="script.js"></script>
        <script>
            //create post
            @if (session('create'))
            swal({
                title:'{{ session('create') }}',
                icon: "{{asset('/images/e-ulat_logo.png')}}",  
            });
            @endif
            //edit post
            @if (session('edit'))
            swal({
                title:'{{ session('edit') }}',
                icon: "{{asset('/images/e-ulat_logo.png')}}", 
            });
            @endif
            //delete post
            @if (session('remove'))
            swal({
                title:'{{ session('remove') }}',
                icon: "{{asset('/images/e-ulat_logo.png')}}", 
              
            });

            @endif
            //user's profile
            @if (session('userprofile'))
            swal({
                title:'{{ session('userprofile') }}',
                icon: "{{asset('/images/e-ulat_logo.png')}}", 
            });
            @endif

            @if (session('register'))
            swal({
                title:'{{ session('register') }}',
                icon: "{{asset('/images/e-ulat_logo.png')}}", 
            });
            @endif
        </script>
        @yield('scripts')
       
    </body>
    
   
</html>