<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    //All these operations work

    public function index()
    {
      return PostResource::collection(Post::with('user')->get()) ;
    }

    public function store(Request $request , Post $post)
    { 
      //Just for testing , doesn't have any validation rules
      $post = Post::create($request->all());
      return PostResource::make($post);
    }

    public function update(Request $request , Post $post)
    {
      //Just for testing
      $post->update($request->all());
      return PostResource::make($post);
    }

    public function destroy(Post $post )
    { 
      //Just for testing
      $post->delete() ;
      return response()->noContent() ;
    }

}
