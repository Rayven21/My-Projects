@extends('layouts.app')
@section('content')
<style>
input[type="file"]{
    display: none;
}
.imageFileLabel{
    padding: 6px;
    width: 180px;
    justify-content: center;
    align-items:center;
    display: flex;
}

#demo img{
  width: 300px;
  height: auto;
  display: block;
  margin-bottom: 10px;
  
}
</style>
    <div class="grid grid-cols-8 gap-4 bg-gray-200">
        <div class="sm:col-start-2 sm:col-end-8 col-start-1 col-end-9 col-span-5 bg-gray-100 border rounded-lg shadow-lg p-6 rounded-lg">
        @auth
       {{--  {{$user->name}}
        @if($user->name == 'E-Ulat Admin') --}}
            <form action="{{ route('posts')}}" method="post" class="mb-4" enctype="multipart/form-data">
                
            @csrf
                <div class="mb-4 min-w-16">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray border-2 w-full sm:min-:w-32 p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something!"></textarea>
                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
                    <div class="grid grid-cols-2 gap-4 place-content-center">
                        <div>
                            <input type="file" name="image" id="imageFile" style="display:none" />
                            <label id="imageFileButton" style="cursor:pointer;" class="imageFileLabel rounded-lg px-4 py-2 border-2 border-gray-200 bg-white text-black hover:bg-gray-200 duration-300">
                            <span class="material-icons">
                                    add_photo_alternate
                            </span>
                            Choose a photo</label>
                            <p id="demo" class="mt-2"></p>
                        </div>
                        <div class="text-right">
                            <select name="category" id="category" class="rounded-lg px-4 py-2 border-2 border-gray-200 bg-white text-black">
                                <option selected disabled>Categories</option>
                                <option value="News">News</option>
                                <option value="General">General</option>
                                <option value="Entertainment">Entertainment</option>
                                <option value="Educational">Educational</option>
                                <option value="Sports">Sports</option>
                                <option value="Gaming">Gaming</option>
                                <option value="Advertisement">Advertisement</option>
                                <option value="Others">Others</option>
                            </select>
                            @error('category')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 place-content-center">
                    <div>
                        <p class="text-red-500 text-sm">Note: post something related to the community to expedite approval by administrators</p>
                    </div>
                    <div class="text-right"> 
                        <button type="submit" class="bg-green-500 text-white hover:bg-green-400 hover:text-white px-6 py-2 rounded font-medium duration-300">Post</button>
                    </div>
                </div>
               
            </form>
        @endauth
        </div>
        <div class="col-start-1 col-end-9 col-span-4 bg-white border rounded-lg shadow-lg p-6 rounded-lg min-w-16 sm:col-start-3 sm:col-end-7 ">
            @if($posts->count())
                @foreach($posts as $post)
                <div class="col-start-4 col-end-5 col-span-3 bg-gray-100 border rounded-lg shadow-lg p-5 rounded-lg">
                    <x-post :post="$post"/>
                </div>
                @endforeach
               {{$posts->links()}}
            @else
            <div>
                <p>There are no posts to see as of yet</p>
            </div>
            @endif
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(e) {
          $("#imageFileButton").click(function() {
            $("#imageFile").trigger('click');
          });
        });


        var inputs = document.querySelectorAll('input[type=file]');

        inputs.forEach(function(input) {
        
          input.onchange = function() {
            var file = this.files[0];
            displayAsImage(file);
          };
      
        });


        function displayAsImage(file) {
        
          var imgURL = URL.createObjectURL(file),
            img = document.createElement('img');
        
          img.onload = function() {
            URL.revokeObjectURL(imgURL);
          };
      
          img.src = imgURL;
          document.getElementById("demo").appendChild(img);
      
        }
    </script>
@endsection