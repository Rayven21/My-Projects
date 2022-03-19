@extends('layouts.app')

@section('content')

<style>
.container {
    text-align: center;
    background:rgba(229, 231, 235, var(--tw-bg-opacity))
    max-width: 100%;
    margin: 0 auto;
}

.header {
    padding-top: 60px;
    color: gray;
    font-size: 20px;
    margin: auto;
    line-height: 50px;
}

.sub-container {
    max-width: 100%;
    margin: auto;
    padding: 48px 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.teams {
    margin: 10px;
    padding: 22px;
    max-width: 30%;
    cursor: pointer;
    transition: 0.4s;
    box-sizing: border-box;
}

.teams:hover {
    background:rgba(255, 255, 255, 0.438);
    border-radius: 12px;
}

.teams img {
    margin-left: auto;
    margin-right: auto;
    width: 250px;
    height: 250px;
}

.name {
    padding: 12px;
    font-weight: bold;
    font-size: 18px;
}

.design {
    font-style: italic;
    color:green;
}

.social-links {
    margin: 14px;
}

.social-links a {
    display: inline-block;
    height: 30px;
    weight: 30px;
    transition: .4s;
}

.social-links a:hover {
    transform: scale(1.5);
}

.social-links a {
    color: #444;
}

@media screen and (max-width: 600px) {
    .teams {
        max-width: 100%;
    }
}


</style>

<div class="container">
    <div class="header">
        <h1 class="text-green-800 text-4xl font-bold">Our Team</h1>
    </div>
    <div class="sub-container">
        <div class="teams">
            <img src="{{asset('/images/kenneth.jpg')}}" alt="">
            <div class="name">Kenneth Quilantang</div>
            <div class="design">Developer</div>
            <div class="m-4 text-gray-900 font-light">"E-Ulat attempts to solidify the relationship of neighborhood to the next level using a social network technology that helps people communicate their thoughts or even bring quick news and updates."</div>

            <div class="social-links">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>

        <div class="teams">
            <img src="{{asset('/images/rayven.jpg')}}" alt="">
            <div class="name">Rayven Mercado</div>
            <div class="design">Developer</div>
            <div class="m-4 text-gray-900 font-light">"One of my goal is to have our users be able to create friends and enjoy while using this web application to converse with other people about different topics you want to talk about."</div>

            <div class="social-links">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>

        <div class="teams">
            <img src="{{asset('/images/james.jpg')}}" alt="">
            <div class="name">James Rivera</div>
            <div class="design">Developer</div>
            <div class="m-4 text-gray-900 font-light">"We're very excited to share you our work that only came from a spark of idea just recently. Let's build and work together so we can disseminate significant news and information that everyone deserves."</div>

            <div class="social-links">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
    </div>
</div>

<footer class="text-gray-100 bg-green-600  bottom-0 w-full">
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