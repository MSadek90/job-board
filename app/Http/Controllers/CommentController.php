<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentPostRequest;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Post $post)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentPostRequest $request,Post $post)
    {
        $comment = new Comment();

        $comment->body= $request->input('body');
        $comment->post_id= $post->id;

        $comment->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $comment = Comment::find($id);
            return view('comments/singlecomment',[
                'comment' => $comment,
                'pagetitle' => 'single comment'
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::destroy($id);
    }
}
