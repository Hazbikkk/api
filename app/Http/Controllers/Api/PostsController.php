<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostsRequest;
use App\Http\Resources\PostsResource;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StorePostsRequest $request)
    {
        $posts = PostsResource::collection(Post::paginate(5));
        if($posts->isEmpty()) return response()->json(["message" => "Required"]);
        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new PostsResource(Post::create($request->all()));
        return response()->json($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = new PostsResource($post);
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        if($post->isEmpty()) abort(404);
        return response()->json(["message" => "Post is updated!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        if($post->isEmpty()) abort(404);
        return response()->json(["message" => "Post is destroying!"]);
    }
}
