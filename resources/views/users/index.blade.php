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
@foreach($users as $user)
    <tr>
        <td class="bg-transparent">{{$user->id}}</td>
        <td class="bg-transparent"> <a href="{{ route('users.show', ['id'=>$user['id']], false) }}"> {{$user->name}} </a> </td>
        <td class="bg-transparent"> {{$user->email}} </td>
        <td class="bg-transparent">   
            <a href="{{ route('users.edit', ['id'=>$user['id']], false) }}" class="btn btn-sm btn-secondary">Edit</a>
            <a href="" class="btn btn-sm btn-danger">Delete</a>
        </td>
    </tr>
@endforeach
</tbody>
</table>
@endsection
