<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <link rel="stylesheet" href="admincss/css/show_post.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

      <div class="page-content">
        @if(session()->has('message'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @elseif(session()->has('message2'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message2')}}
        </div>
        @endif
        <h1 class="title-deg">All Post</h1>
        <table class="table-deg">
            <tr class="th-deg">
                <th>Post title</th>
                <th>Description</th>
                <th>Post by</th>
                <th>Post status</th>
                <th>User type</th>
                <th>Image</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>Accept</th>
                <th>Reject</th>
            </tr>
            @foreach($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->post_status}}</td>
                <td>{{$post->usertype}}</td>
                <td>
                    @if($post->image == null)
                    -
                    @else
                    <img class="img-deg" src="postImage/{{$post->image}}" alt="">
                    @endif
                </td>
                <td>
                    <a class="btn btn-danger" href="{{url('delete_post', $post->id)}}" 
                        onclick="confirmation(event)">Delete</a>
                </td>
                <td>
                    <a class="btn btn-success" href="{{url('edit_page', $post->id)}}">Edit</a>
                </td>
                <td>
                    <a class="btn btn-outline-secondary" href="{{url('accept_post', $post->id)}}">Accept</a>
                </td>
                <td>
                    <a class="btn btn-outline-primary" href="{{url('reject_post', $post->id)}}">Reject</a>
                </td>
            </tr>
            @endforeach
        </table>
      </div>

      @include('admin.footer')

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