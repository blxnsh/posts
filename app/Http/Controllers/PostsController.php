<?php

namespace App\Http\Controllers;

use App\Validation;
use App\Comments;
use App\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
     {
       return view('main');
     }


    public function getPosts()
     {
        $posts = Posts::all();

        return $posts;
     }

     public function createPost(Request $request)
      {
        $validator =  new Validation($request);

        if(!$validator->commentFails()){
          $post = Posts::create(['title' => $request->title,
                                 'body' => $request->body]);
          return $post;
        }

      }
}
