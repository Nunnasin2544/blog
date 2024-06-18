<!DOCTYPE html>
<html lang="en">
   <head>
        <base href="/public">
        <link rel="stylesheet" href="admincss/css/post_page.css">
        @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
         @if(session()->has('message'))
         <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
             {{session()->get('message')}}
         </div>
         @endif
         <h1 style="background-color: #373737" class="post-title">Update Post</h1>
        <div style="background-color: #373737">
            <form action="{{url('update_post_data', $data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div-center">
                    <label>Title</label>
                    <input type="text" name="title" value="{{$data->title}}">
                </div>
                <div class="div-center">
                    <label>Description</label>
                    <textarea name="description">{{$data->description}}</textarea>
                </div>
                <div class="div-center">
                    <label>Current image</label>
                    <img height="100px" width="150px" 
                    src="/postImage/{{$data->image}}" alt="">
                </div>
                <div class="div-center add-image">
                    <label>Update image</label>
                    <input style="color: white" type="file" name="image">
                </div>
                <div class="div-center">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
      </div>
      @include('home.footer')   
   </body>
</html>