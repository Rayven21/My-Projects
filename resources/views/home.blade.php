@extends('layouts.app')

@section('content')
<div class="flex flex-wrap">
    <div class="w-full sm:w-8/12 mb-10">
      <div class="container mx-auto h-full sm:p-10">
        <nav class="flex px-4 justify-between items-center">
          <div class="text-4xl font-bold">
            E-Ulat<span class="text-green-700">.</span>
          </div>
          <div>
            <img src="https://image.flaticon.com/icons/svg/497/497348.svg" alt="" class="w-8">
          </div>
        </nav>
        <header class="container px-4 lg:flex mt-10 items-center h-full lg:mt-0">
          <div class="w-full">
            <h1 class="text-4xl lg:text-6xl font-bold">Let your voice and thoughts be <span class="text-green-700">heard</span></h1>
            <div class="w-20 h-2 bg-green-700 my-4"></div>
            <p class="text-xl mb-10">The appropriate platform to talk with people within your community. Engage in discussions and earn karma by providing relevant and noteworthy information to everyone.</p>
            <button class="bg-green-500 text-white text-xl font-medium px-4 py-2 rounded shadow hover:bg-green-400 duration-300" onclick="location.href='{{ route('login') }}'">Learn More</button>
          </div>
        </header>
      </div>
    </div>
    <img src="{{ asset ('images/speakerman.webp')}}" alt="Speaker Man" class="w-full h-48 object-cover sm:h-screen sm:w-4/12">
  </div>

  <div class="flex flex-wrap">
    <img src="{{ asset ('images/imagesecondscroll.webp')}}" alt="Man Browsing Web" class="w-full h-48 object-cover sm:h-screen sm:w-4/12">
    <div class="w-full sm:w-8/12 mb-10">
      <div class="container mx-auto h-full sm:p-10">
        <nav class="flex px-4 justify-between items-center">
      
          <div>
            <img src="https://image.flaticon.com/icons/svg/497/497348.svg" alt="" class="w-8">
          </div>
        </nav>
        <header class="container px-4 lg:flex mt-10 items-center h-full lg:mt-0">
          <div class="w-full">
            <h1 class="text-4xl lg:text-6xl font-bold">Variety of topics to talk about</h1>
            <div class="w-20 h-2 bg-green-700 my-4"></div>
            <p class="text-xl mb-10"> You can discuss a wide-range of different topics according to your interests, needs, reports, ideas or opinions.</p>
            <button class="bg-green-500 text-white text-xl font-medium px-4 py-2 rounded shadow hover:bg-green-400 duration-300" onclick="location.href='{{route('login') }}'">Learn More</button>
          </div>
        </header>
      </div>
    </div>
    
  </div>
  

<footer class="text-gray-100 bg-green-600">
    <div class="max-w-3xl mx-auto py-6">
        <h1 class="text-center text-lg lg:text-2xl">
            Be one of the first movers, join others and never miss <br> out on new news, discussions and information.
        </h1>

        <h3 class="text-center text-base lg:text-base font-medium mt-8">
          Copyright 2021. E-Ulat. Designed by MQR
        </h3>
      

   

        <hr class="h-px mt-6 bg-gray-700 border-none">

        <div class="flex flex-col items-center justify-between mt-4 md:flex-row">
            <div>
                <a href="#" class="text-xl font-bold text-gray-100 hover:text-white">E-Ulat</a>
            </div>

            <div class="flex mt-4 md:m-0">
                <div class="-mx-4">
                  <a href="{{route('home')}}" class="px-4 text-sm text-gray-100 font-medium hover:text-white">Home</a>
                  <a href="{{route('terms&conditions')}}" class="px-4 text-sm text-gray-100 font-medium hover:text-white">Terms and Conditions</a>
                  <a href="{{route('aboutus')}}" class="px-4 text-sm text-gray-100 font-medium hover:text-white">About</a>
                  <a href="{{route('contactus')}}" class="px-4 text-sm text-gray-100 font-medium hover:text-white">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>
 
@endsection