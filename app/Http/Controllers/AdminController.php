<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function post_page() 
    {
        return view('admin.post_page');
    }

    public function add_post(Request $request) 
    {
        $user = Auth()->user();
        $user_id = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';
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
        return redirect()->back()->with('message', 'Post Added Successfully');
    }

    public function show_post() 
    {
        $posts = Post::all();

        return view('admin.show_post', compact('posts'));
    }

    public function delete_post($id) 
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->back()->with('message', 'Post Deleted Successfully');
    }

    public function edit_page($id) 
    {
        $post = Post::find($id);

        return view('admin.edit_page', compact('post'));
    }

    public function update_post(Request $request, $id)
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

    public function accept_post($id)
    {
        $data = Post::find($id);
        $data->post_status = 'active';
        $data->save();

        return redirect()->back()->with('message2', 'Post status change to Active');
    }

    public function reject_post($id)
    {
        $data = Post::find($id);
        $data->post_status = 'rejected';
        $data->save();

        return redirect()->back()->with('message', 'Post status change to Rejected');
    }
}
