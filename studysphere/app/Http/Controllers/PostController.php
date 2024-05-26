<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostController extends Controller
{

    //LOAD TASK
    function loadPost(){
        if(Auth::check()){
            $posts = Post::where('user_id', Auth::id())->orderBy('created_at', 'asc')->get();
            return view('/publish', ['posts' => $posts]);
        }
        return redirect()->route('login');
    }

    //ADD TASK
    function addPost(Request $request){ 

        $data['subject'] = $request->subject;
        $data['status'] = $request->status;
        $data['post'] = $request->post;
        $data['user_id'] = auth()->user()->id;

        $user = Post::create($data);

        return redirect()->route('publish');
    }
}
