<?php

namespace App\Http\Controllers;

use  App\Models\User;

use Illuminate\Http\Request;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
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
        return '<p>Store a newly created resource in storage</p>';
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $user = User::find($id);
        return view('users.show', ['user' => $user]);
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
        return view('users.update', ['id' => $id]); // no view for update or delete
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return view('users.destroy', ['id' => $id]);
    }
}
