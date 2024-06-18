<!DOCTYPE html>
<html lang="en">
   <head>
    <link rel="stylesheet" href="admincss/css/post_page.css">
        @include('home.homecss')
   </head>
   <body>
      @include('sweetalert::alert')
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
         <!-- banner section start -->
      <h1 style="background-color: #373737" class="post-title">Add Post</h1>
        <div style="background-color: #373737">
            <form action="{{url('user_post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div-center">
                    <label>Title</label>
                    <input type="text" name="title">
                </div>
                <div class="div-center">
                    <label>Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="div-center add-image">
                    <label>Add Image</label>
                    <input style="color: white" type="file" name="image">
                </div>
                <div class="div-center">
                    <input type="submit" value="Add Post" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
      @include('home.footer')   
   </body>
</html>