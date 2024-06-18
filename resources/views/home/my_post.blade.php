<!DOCTYPE html>
<html lang="en">
   <head>
        @include('home.homecss')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <style type="text/css">
            .post-deg {
                padding: 30px;
                text-align: center;
                background-color: rgb(37, 37, 37);
            }

            .title-deg {
                font-size: 30px;
                font-weight: 600;
                padding: 0px 10px 10px;
                color: white;
            }

            .des-deg {
                font-size: 18px;
                font-weight: 500;
                padding: 0px 10px 10px;
                color: white;
            }

            .img-deg {
                width: 300px;
                height: 200px;
                padding: 20px;
                margin: auto;
            }
        </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
         @if(session()->has('message'))
         <div class="alert alert-danger">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
             {{session()->get('message')}}
         </div>
         @endif
         @foreach($data as $data)
         <div class="post-deg">
            <img class="img-deg" src="/postImage/{{$data->image}}" alt="">
            <h4 class="title-deg">{{$data->title}}</h4>
            <p class="des-deg">{{$data->description}}</p>
            <a href="{{url('my_post_del', $data->id)}}" class="btn btn-danger"
                onclick="confirmation(event)">Delete</a>
            <a href="{{url('post_update_page', $data->id)}}" class="btn btn-primary">Update</a>
         </div>
         @endforeach
      </div>

      @include('home.footer')

      <script type="text/javascript">
        function confirmation(ev)
        {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');

            swal({
                title: "Are you sure to Delete this?",
                text: "You won't be able to revert this delete",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willConfirm) => {
                if(willConfirm)
                {
                    window.location.href = urlToRedirect;
                }
            })
        }
      </script>   
   </body>
</html>