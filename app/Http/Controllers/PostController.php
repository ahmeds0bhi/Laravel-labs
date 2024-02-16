<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->paginate(10);

        return view("posts.index", [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('posts.create', [
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slug = Str::slug($request->title);


        // storing
        Post::create([
            'title' =>  $request->title,
            'body' => $request->body,
            'slug' => $slug,
            'user_id' => $request->user_id

        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        $post = Post::with('user')->findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {


        $post = Post::with('user')->findOrFail($id);
        $users = User::all();

        return view('posts.edit', [
            'post' => $post,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slug = Str::slug($request->title);

        Post::find($id)->update([
            'title' =>  $request->title,
            'body' => $request->body,
            'slug' => $slug,
            'user_id' => $request->user_id
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::find($id)->delete();
        return redirect()->route('posts.index');
    }
}
