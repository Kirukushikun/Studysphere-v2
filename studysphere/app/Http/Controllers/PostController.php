<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Comments;

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
        $data['author_name'] = auth()->user()->name;

        $user = Post::create($data);

        return redirect()->route('postmanager');
    }

    //DELETE POST
    function deletePost(Post $id){
        $comment = Comments::where('post_id', $id)->delete();
        $id->delete();
        return redirect()->route('postmanager');
    }

    //EDIT POST
    function editPost($id) {
        $post = Post::findOrFail($id);
        return view('/edit-post', ['post' => $post]);
    }

    //VIEW POST
    function viewPost($id) {
        $post = Post::findOrFail($id);
        return view('/view-post', ['post' => $post]);
    }


    //LOAD PUBLIC POST
    function posts(){
        $posts = Post::where('status', 'published')->with('comments')->orderBy('created_at', 'asc')->get();
        return view('posts', ['posts' => $posts]);
    }

    //LOAD COMMENTS
    function loadComments(){
        $posts = Post::where('user_id', Auth::id())->with('comments')->orderBy('created_at', 'asc')->get();
        return view('comments', ['posts' => $posts]);
    }

    //ADD COMMENT
    function addComment(Request $request){ 
        if(Auth::check()){
            $data['user_id'] = auth()->user()->id;
            $data['post_id'] = $request->post;
            $data['author_name'] = auth()->user()->name;
            $data['status'] = $request->status;
            $data['comment'] = $request->comment;

            $user = Comments::create($data);

            return redirect()->route('posts');            
        }
        return redirect()->route('login');
    }
}
