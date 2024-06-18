<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <link rel="stylesheet" href="admincss/css/post_page.css">

  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

      <div class="page-content">
        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif
        <h1 class="post-title">Add Post</h1>
        <div>
            <form action="{{url('add_post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div-center">
                    <label>Post Title</label>
                    <input type="text" name="title">
                </div>
                <div class="div-center">
                    <label>Post Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="div-center add-image">
                    <label>Add Image</label>
                    <input type="file" name="image">
                </div>
                <div class="div-center">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
      </div>

      @include('admin.footer')
  </body>
</html>