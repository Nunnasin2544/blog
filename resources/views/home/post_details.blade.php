<!DOCTYPE html>
<html lang="en">
   <head>
        <base href="/public">
        @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
         <!-- banner section start -->
      </div>
      <div style="z-index: -1; text-align: center;" class="col-md-12">
        <div><img style="padding: 20px" src="/postImage/{{$post->image}}" class="services_img"></div>
        <h3><b>{{$post->title}}</b></h3>
        <h4>{{$post->description}}</h4>
        <p>Post by <b>{{$post->name}}</b></p>
     </div>
      @include('home.footer')   
   </body>
</html>