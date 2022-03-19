@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
@section('content')
        <div class="grid grid-cols-6 gap-4">
            <div class="sm:col-start-2 col-span-2 rounded-xl p-4 col-start-1">
                <div class="container">
                    <div class="btn bg-white col-span-2 p-24 mb-4 shadow-lg rounded-lg hover:bg-green-200 duration-300" onclick="location.href='{{ route('news') }}'" style="cursor: pointer;">
                    <a href="{{ route('news') }}" class="text-lg btn md:text-4xl sm:text-2xl font-bold"><img src="{{ asset ('images/megaphone.png')}}" alt="Megaphone" class="w-5/12 -mt-6 -ml-12" style="float:left;"> News</a>
                    </div>
                    <div class="btn bg-white col-span-2 p-24 mb-4 shadow-lg rounded-lg hover:bg-green-200 duration-300" onclick="location.href='{{ route('general') }}'" style="cursor: pointer;">
                        <a href="{{ route('general') }}" class="text-lg  btn md:text-4xl sm:text-2xl font-bold"><img src="{{ asset ('images/general.png')}}" alt="General" class="w-3/12 -mt-9 -ml-6 mr-6" style="float:left;">General</a>
                    </div>
                    <div class="btn bg-white col-span-2 p-24 mb-4 shadow-lg rounded-lg hover:bg-green-200 duration-300" onclick="location.href='{{ route('entertainment') }}'" style="cursor: pointer;">
                        <a href="{{ route('entertainment') }}" class="text-lg btn md:text-4xl sm:text-2xl font-bold"><img src="{{ asset ('images/entertainment.png')}}" alt="Entertainment" class="w-3/12 -mt-7 -ml-6 mr-9" style="float:left;">&nbspEntertainment</a>
                    </div>
                    <div class="btn bg-white col-span-2 p-24 mb-4 shadow-lg rounded-lg hover:bg-green-200 duration-300" onclick="location.href='{{ route('educational') }}'" style="cursor: pointer;">
                        <a href="{{ route('educational') }}" class="text-lg btn md:text-4xl sm:text-2xl font-bold"><img src="{{ asset ('images/educational.png')}}" alt="Educational" class="w-3/12 -mt-9 -ml-6 mr-6.5 mb-6" style="float:left;">Educational</a>
                    </div>
                </div>
            </div>

            <div class="col-end-6 col-span-2 rounded-xl p-4">
                <div class="container">
                    <div class="btn bg-white col-span-2 p-24 mb-4 shadow-lg rounded-lg hover:bg-green-200 duration-300" onclick="location.href='{{ route('sports') }}'" style="cursor: pointer;">  
                        <a href="{{ route('sports') }}" class="text-lg btn md:text-4xl sm:text-2xl font-bold"><img src="{{ asset ('images/sports.png')}}" alt="Sports" class="w-4/12 -mt-5 -ml-3 mr-3" style="float:left;">Sports</a>
                    </div>
                    <div class="btn bg-white col-span-2 p-24 mb-4 shadow-lg rounded-lg hover:bg-green-200 duration-300" onclick="location.href='{{ route('gaming') }}'" style="cursor: pointer;">
                        <a href="{{ route('gaming') }}" class="text-lg btn md:text-4xl sm:text-2xl font-bold"><img src="{{ asset ('images/gaming.png')}}" alt="Gaming" class="w-4/12 -mt-8 -ml-3 mr-3" style="float:left;">Gaming</a>
                    </div>
                    <div class="btn bg-white col-span-2 p-24 mb-4 shadow-lg rounded-lg hover:bg-green-200 duration-300" onclick="location.href='{{ route('advertisement') }}'" style="cursor: pointer;">
                        <a href="{{ route('advertisement') }}" class="text-lg btn md:text-4xl sm:text-2xl font-bold"><img src="{{ asset ('images/advertisement.png')}}" alt="Advertisement" class="w-3/12 -mt-7 mr-8" style="float:left;">Advertisement</a>
                    </div>
                    <div class="btn bg-white col-span-2 p-24 mb-4 shadow-lg rounded-lg hover:bg-green-200 duration-300" onclick="location.href='{{ route('others') }}'" style="cursor: pointer;">
                        <a href="{{ route('others') }}" class="text-lg btn md:text-4xl sm:text-2xl font-bold"><img src="{{ asset ('images/others.jpg')}}" alt="Others" class="w-3/12 -mt-5 mr-4" style="float:left;">Others</a>
                    </div>
                </div>
            </div>
        </div>
</html>
@endsection