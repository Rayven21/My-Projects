@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-9/12 bg-gray-100 p-6 rounded-lg">
           <x-post :post="$post"/>
           <div id="disqus_thread"></div>
    
        @auth
        <script>
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://eulat.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        </div>
        @endauth

    </div>
@endsection