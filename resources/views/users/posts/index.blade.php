@extends('layouts.app')

@section('content')
<style>
input[type="file"]{
    display: none;
}
.userProfileLabel{
    padding: 6px;
    justify-content: center;
    align-items:center;
    display: flex;
}

#demo img{
  width: 60px;
  height: 40px;
  display: block;
  margin-bottom: 10px;
  margin-left: 70px;
}
</style>
    <div class="grid grid-cols-8 gap-4">
            <div class="col-start-2 col-span-3 shadow-lg rounded p-4 bg-gray-100" style="height:700px;">
                <div class="flex justify-center">
                    <img src="/images/avatars/{{ $user->avatar }}" class="shadow-xl rounded mb-4 border border-white rounded-full" style="width:370px; height:340px;">
                </div>
                <div class="text-center">
                    <h1 class="text-2xl font-medium mb-1 font-sans font-bold">{{$user->name}}</h1>
                </div>
                @if($user->name == auth()->user()->name )
                <form enctype="multipart/form-data" action='posts' method="POST">
                    <div class="grid grid-cols-3 gap-0 place-content-center mt-4">
                        <div>
                            <button class="text-gray-500 font-semibold mb-4 gray-100 py-1.0 px-5 duration-300 cursor-default">Update Profile Image</button>
                        </div>
                        <div>
                            <input type="file" name="avatar" onchange="chng()" id="avatarfiletype" accept="image/*" class="hover:bg-white-0 text-gray-800 font-semibold py-1.5" style="display:none;">
                            <label id="uploadAvatar" style="cursor:pointer;" class="userProfileLabel rounded-lg px-4 py-2 border-2 border-gray-200 bg-white text-black hover:bg-gray-200 duration-300">
                                    <span class="material-icons">
                                            add_photo_alternate
                                    </span>
                                    Choose a photo</label> 
                                    @error('avatar')
                                        <div class="text-red-500 mt-2 ml-4 text-sm">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    
                            <script>
                                function chng()
                                {
                                    var typ=document.getElementById("avatarfiletype").value;
                                    var res1 = typ.match(".jpg");
                                    var res2 = typ.match(".png");
                                    var res3 = typ.match(".jpeg");
                                    var res4 = typ.match(".bmp");
                                
                                    if(res1 || res2 || res3 || res4)
                                    {
                                        alert("Image is successfully uploaded");
                                    }
                                    else
                                    {
                                        alert("This file type is not supported");
                                        document.getElementById("avatarfiletype").value=""; //clear the uploaded file
                                    }
                                }
                            
                            </script>
                               <p id="demo" class="mt-2"></p>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                       
                        <div>
                            <input type="submit" value ="Save" class="shadow-l rounded ml-3 mb-4 border border gray-100 py-1.5 px-4 hover:bg-gray-200 duration-300" style="cursor:pointer;">
                            <button class="shadow-l rounded mb-4 border border gray-100 py-1.5 px-4 hover:bg-gray-200 duration-300" formaction="{{ route('posts') }}">Cancel</button>
                        </div>
                    </div>
                </form>
                @endif
                <div class="grid grid-cols-2 gap-4 place-content-center h-48">
                    <p class="ml-20 text-gray-500 font-semibold justify-center">Posts :</p>
                    <p><span class="text-right text-lg text-gray-900 font-bold">{{$posts->count()}}</span></p>
                    <p class="ml-20 text-gray-500 font-semibold justify-center">Upvotes :</p>
                    <p><span class="text-right text-lg text-blue-500 font-bold">{{$user->receivedUpvotes->count()}}</span></p>
                    <p class="ml-20 text-gray-500 font-semibold justify-center">Downvotes :</p>
                    <p><span class="text-red-500 text-lg font-bold">{{$user->receivedDownvotes->count()}}</span></p>
                    <p class="ml-20 text-gray-500 font-semibold justify-center">Merit :</p>
                    <p><span class="text-green-500 text-lg font-bold">{{$user->receivedUpvotes->count() - $user->receivedDownvotes->count() }}</span></p>
                </div>
            </div> 
            <div class="col-start-5 col-end-8 col-span-4 bg-white border rounded-lg shadow-lg p-5 rounded-lg">
                @if($posts->count())
                    @foreach($posts as $post)
                    <div class="col-start-6 col-end-7 col-span-2 bg-gray-100 border rounded-lg shadow-lg p-5 rounded-lg">
                        <x-post :post="$post"/>
                    </div>
                    @endforeach

                    {{$posts->links()}}
                @else
                    <div class="col-start-3 col-end-5 col-span-3 bg-gray-100 border rounded-lg shadow-lg p-5 rounded-lg">
                        <p>{{$user->name}} does not have any posts</p>
                    </div>
                @endif
                
            </div>
    </div>
@endsection

@section('scripts')
<script>
        $(document).ready(function(e) {
          $("#uploadAvatar").click(function() {
            $("#avatarfiletype").trigger('click');
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