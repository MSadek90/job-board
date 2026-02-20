<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostsPostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.post',['posts'=>$posts, 'page_title'=>'Posts']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create',['page_title'=>'Create Post']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsPostRequest $request)
    {

        $post = new Post();

        $post->title = $request->input('title');
        $post->author= $request->input('author');
        $post->description = $request->input('description');

        $post->save();

        return redirect('/posts')->with('success','Post created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view ('posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit',['post'=>$post,'page_title'=>'Edit Post']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $post->title = $request->input('title');
        $post->author= $request->input('author');
        $post->description = $request->input('description');

        $post->save();

        return redirect('/posts')->with('success','Post updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function toggleActive(string $id){
        
    }
}
