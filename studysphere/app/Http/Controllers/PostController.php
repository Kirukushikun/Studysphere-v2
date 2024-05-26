<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostController extends Controller
{

    //LOAD PUBLISHMANAGER
    function loadPost(){
        if(Auth::check()){
            $posts = Post::where('user_id', Auth::id())->orderBy('created_at', 'asc')->get();
            return view('/publish', ['posts' => $posts]);
        }
        return redirect()->route('login');
    }

    //LOAD TASK FORM
    function post(){
        if(Auth::check()){
            return view('/add-post');
        }
        return redirect()->route('login');
    }

    //ADD POST
    function addPost(Request $request){ 

        $data['subject'] = $request->subject;
        $data['status'] = $request->status;
        $data['post'] = $request->post;
        $data['user_id'] = auth()->user()->id;

        $user = Post::create($data);

        return redirect()->route('postmanager');
    }

    //DELETE POST
    function deletePost(Post $id){
        $id->delete();
        return redirect()->route('postmanager');
    }

    //EDIT POST
    function editPost($id) {
        $post = Post::findOrFail($id);
        return view('/edit-post', ['post' => $post]);
    }
}
