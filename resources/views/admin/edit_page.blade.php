<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
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
        <h1 class="post-title">Update Post</h1>
        <div>
            <form action="{{url('update_post', $post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div-center">
                    <label>Post title</label>
                    <input type="text" name="title" value="{{$post->title}}">
                </div>
                <div class="div-center">
                    <label>Post description</label>
                    <textarea name="description">{{$post->description}}</textarea>
                </div>
                <div class="div-center">
                    <label>Current image</label>
                    <img height="100px" width="150px" 
                    src="/postImage/{{$post->image}}" alt="">
                </div>
                <div class="div-center add-image">
                    <label>Update image</label>
                    <input type="file" name="image">
                </div>
                <div class="div-center">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
      </div>

      @include('admin.footer')
  </body>
</html>