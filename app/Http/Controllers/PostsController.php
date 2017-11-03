<?php

namespace App\Http\Controllers;

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

    public function getOnePost(Request $request)
     {
        $post = Posts::find($request->id);

        return $post;
     }

    public function getComments(Request $request)
     {
        $comments = Posts::find($request->id)->comments()->get();

        return $comments;
     }

     public function createPost(Request $request)
      {
        $this->validate($request,  ['title' => 'required',
                                   'body' => 'required']);

         $post = Posts::create(['title' => $request->title,
                                 'body' => $request->body]);
        return $post;
      }

     public function createComment(Request $request)
      {
        $this->validate($request,  ['posts_id' => 'required',
           'name' => 'required',
           'email' => 'required',
           'body' => 'required'
           ]);

        $comment = Comments::create(['posts_id' => $request->posts_id,
                                 'name' => $request->name,
                                 'email' => $request->email,
                                 'body' => $request->body
                               ]);
          return $comment;

      }

      public function updatePost(Request $request)
       {
         $this->validate($request,  ['title' => 'required',
                                    'body' => 'required']);

          Posts::find($request->id)->update(['title' => $request->title,
                                 'body' => $request->body]);
          return Posts::find($request->id);
       }

       public function deletePost(Request $request)
        {
          Posts::find($request->id)->delete();
          return 'true';
        }

}
