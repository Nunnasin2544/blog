<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Post;

use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index() 
    {
        if(Auth::id()) 
        {
            $usertype = Auth()->user()->usertype;

            $posts = Post::where('post_status','=','active')->get();

            if($usertype == 'user') 
            {
                return view('home.homepage', compact('posts'));
            }
            else if($usertype == 'admin') 
            {
                return view('admin.adminhome');
            }
            else
            {
                return redirect()->back();
            }
        }
    }

    public function homepage() 
    {
        $posts = Post::where('post_status','=','active')->get();

        return view('home.homepage', compact('posts'));
    }

    public function post_details($id) 
    {
        $post = Post::find($id);

        return view('home.post_details', compact('post'));
    }

    public function create_post() 
    {
        return view('home.create_post');
    }

    public function user_post(Request $request) 
    {
        $user = Auth()->user();
        $user_id = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'pending';
        $post->user_id = $user_id;
        $post->name = $name;
        $post->usertype = $usertype;
  
        //Upload Image
        $image = $request->image;

        if($image) 
        {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postImage', $imageName);
            $post->image = $imageName;
        }

        $post->save();
        Alert::success('Congrats', 'You have Added the post successfully');
        return redirect()->back();
    }

    public function my_post() 
    {
        $user = Auth::user();
        $user_id = $user->id;
        $data = Post::where('user_id','=',$user_id)->get();

        return view('home.my_post', compact('data'));
    }

    public function my_post_del($id)
    {
        $data = Post::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Post Deleted Successfully');
    }

    public function post_update_page($id)
    {
        $data = Post::find($id);

        return view('home.post_update_page', compact('data'));
    }

    public function update_post_data(Request $request, $id)
    {
        $data = Post::find($id);
        $data->title = $request->title;
        $data->description = $request->description;

        //Upload Image
        $image = $request->image;

        if($image) 
        {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postImage', $imageName);
            $data->image = $imageName;
        }

        $data->save();
        return redirect()->back()->with('message', 'Post Updated Successfully');
    }
}
