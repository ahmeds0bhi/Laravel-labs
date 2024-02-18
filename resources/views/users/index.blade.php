@extends('layouts.main')
@section('title', 'blog-users')
<style>
    .pagination-container.mx-auto nav div.hidden div:last-of-type {
        display: none;
    }
    .pagination-container.mx-auto nav div.hidden div:first-of-type {
        margin-top: 10px;
    }
</style>

@section('content')
<table class="table">
    <thead>
        <tr >
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Post counts</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
   
    <tbody> 
@foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td> <a href="{{ route('users.show', ['id'=>$user['id']], false) }}"> {{$user->name}} </a> </td>
        <td> {{$user->email}} </td>
        <td>{{ $user->posts_count }}</td>
        <td>   
            <a href="{{ route('users.edit', ['id'=>$user['id']], false) }}" class="btn btn-sm btn-secondary">Edit</a>

            <form method="POST" action="{{ route('users.destroy', $user->id) }}" class="d-inline">
                @csrf
                @method('DELETE')
                <input type="submit" name="delete" class="btn btn-sm btn-danger" value="Delete" />
            </form>

        </td>
    </tr>
@endforeach
</tbody>
</table>

<div class="pagination-container mx-auto w-25 mt-3">
    {{ $users->links() }}
</div>

@endsection
