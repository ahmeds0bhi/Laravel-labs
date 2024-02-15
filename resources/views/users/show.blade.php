@extends('layouts.main')

@section('title', 'blog')

@section('content')
<table class="table">
    <thead>
        <tr >
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
   
    <tbody> 
    <tr>
        <td> {{$user->id}} </td>
        <td>  {{$user->name}} </td>
        <td> {{$user->email}} </td>
        <td>   
            <a href="{{ route('users.edit', ['id'=>$user['id']], false) }}" class="btn btn-sm btn-secondary">Edit</a>
            <a href="" class="btn btn-sm btn-danger">Delete</a>
        </td>
    </tr>
</tbody>
</table>
@endsection