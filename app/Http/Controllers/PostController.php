<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $AunthenticatedUser = Auth::user();
        $users = User::all();
        return view('posts.create', [
            'users' => $users,
            'authUser' => $AunthenticatedUser,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        // validaton

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path = $request->file('image')->store('posts', 'public');
            $data['image'] = $path;
        }
        // storing
        $data['slug'] = Str::slug($data['title']);
        $post = Post::create($data);

        event(new \App\Events\PostCreated($post)); // add event post_count
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


        // $post = Post::with('user')->findOrFail($id);

        $post = Post::where('id', $id)->first();
        $user = User::find($post->user_id);
        $user_id = $post->user_id;

        $AunthenticatedUser = Auth::user();



        if ($AunthenticatedUser->id != $user_id) {
            return redirect()->route('posts.index')->with('message', 'You are not allowed to edit this post');;
        } else {
            return view('posts.edit', [
                'post' => $post,
                'user' => $user,
                'authUser' => $AunthenticatedUser
            ]);
        }
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
