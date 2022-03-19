@extends('layouts.app')

@section('content')
{{-- @include('layouts/auth/user_info') --}}

@php

/* echo UserInfo::get_ip(); */
/* $ip = file_get_contents('https://api.ipify.org'); */

@endphp

<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        <h1 class="text-green-700 text-opacity-100 font-bold text-2xl">Let's have your location verified first!</h1>
        <div class="mb-4">
              
                 
                <form action="{{route('get-ip-details') }} " method="post">
                    @csrf
                   
                    <input type="hidden" name="ip" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="" readonly>
                    <div class="mt-4">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded font-medium hover:bg-green-400 duration-300">Get IP Details</button>
                    </div>
                </form>
               
                @if (isset($arr_ip))
                    <br>
                    {{-- <h1 id="ipaddress" class="text-green-1000 text-opacity-100 font-medium text-base"><p id="details"></p></h1> --}}
                    <h1 class="text-green-1000 text-opacity-100 font-medium text-base">Your City: {{$arr_ip->city}} <h1>
                    <h1 class="text-green-1000 text-opacity-100 font-medium text-base">Your Country: {{$arr_ip->country}}</h1>

                    @if ($arr_ip->country != "Philippines")
                        <br>
                        <h1 class="text-red-500 text-opacity-100 font-medium text-base">Unfortunately, you are not allowed to register based on your current location</h1>
            
                    @else
                        <br>
                        <h1 class="text-green-500 font-medium text-base">Congratulations! <span class="text-gray-800 font-normal text-base">You are allowed to register. Now click the register button below to proceed<span></h1>
                        <button onclick="location.href='{{ route('register') }}'" class="bg-green-500 text-white px-4 py-2 rounded font-medium mt-2 hover:bg-green-400 duration-300">Register now</a>
                    @endif 
                @endif

                
        </div>
    </div>
</div>
<script>
       fetch('https://ipinfo.io/json?token=4a86c290a56d44').then(
        (response) => response.json()
        ).then(
        (jsonResponse) => {
            //this will display the IP as a p elemenet text
            $('#details').html('Your IP Address: ' + jsonResponse.ip)
            $('#city').html('Your City: ' + jsonResponse.city)
            //here we are assigning it as a value to the input
            $('input[name="ip"]').val(jsonResponse.ip);
        }
    )
    </script>
@endsection