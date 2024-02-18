@extends('layouts.main')

@section('title', 'blog')

@section('content')

@isset($post->image)
{{-- <div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src= "{{ Storage::disk()->url($post->image) }}"  class="img-fluid" > 
        </div>
</div>
</div> --}}

<div class="card" style="width: 18rem;">
    <img src="{{ Storage::disk()->url($post->image) }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
    </div>
  </div>


@endisset
<table class="table">
    <thead>
        <tr >
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Published at</th>
            <th scope="col">created by</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
   
    <tbody> 
    <tr>
        <td> {{$post->id}} </td>
        <td>  {{$post->title}} </td>
        <td> {{$post->body}} </td>
        <td> {{$post->published_at}} </td>
        <td> {{$post->user->name}} </td>
        <td>   
            <a href="{{ route('posts.edit', ['id'=>$post['id']], false) }}" class="btn btn-sm btn-secondary">Edit</a>
            <a href="" class="btn btn-sm btn-danger">Delete</a>
        </td>
    </tr>
</tbody>
</table>


@endsection