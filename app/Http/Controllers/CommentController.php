<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentResource;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        CommentResource::collection(Post::with('post')->get()) ; ;
    }

      public function store(Request $request , Comment $comment)
    { 
      //Just for testing , doesn't have any validation rules
      $comment = Comment::create($request->all());
      return CommentResource::make($comment);
    }

    public function update(Request $request , Comment $comment)
    {
      //Just for testing
      $comment->update($request->all());
      return CommentResource::make($comment);
    }

    public function destroy(Comment $comment )
    { 
      //Just for testing
      $comment->delete() ;
      return response()->noContent() ;
    }

}


