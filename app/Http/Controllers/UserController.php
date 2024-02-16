<?php

namespace App\Http\Controllers;

use  App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;





class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::withCount('posts')->paginate(10);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email'
        ]);

        // storing
        User::create([
            'name' =>  $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {

        $posts = User::find($id)->posts()->paginate(10);
        $user = User::find($id);


        return view('users.show', [
            'user' => $user,
            'posts'=>$posts
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validation
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email'
        ]);

        // updating
        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);


        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index');
    }
}
