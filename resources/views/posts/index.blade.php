@extends('layouts.main')
@section('title', 'blog-posts')

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
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Published_at</th>
            <th> Publisher </th>
            <th> Image </th>
            <th scope="col">Action</th>
        </tr>
    </thead>
   
    <tbody> 
@foreach($posts as $post)
    <tr>
        <td>{{$post->id}}</td>
        <td> <a href="{{ route('posts.show', ['id'=>$post['id']], false) }}"> {{$post->title}} </a> </td>
        <td> {{$post->body}} </td>
        <td> {{$post->published_at}} </td>
        <td> {{ $post->user->name }} </td>
        <td> 
            @isset($post->image)
            <img src= "{{ Storage::disk()->url($post->image) }}" style="width: 50" class="img-thumbnail"> 
            @endisset
        
        </td>
        <td>   
            <a href="{{ route('posts.edit', ['id'=>$post['id']], false) }}" class="btn btn-sm btn-secondary">Edit</a>

            <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="d-inline">
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
    {{ $posts->links() }}
</div>

@endsection