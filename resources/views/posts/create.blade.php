@extends('layouts.main')

@section('title', 'blog')

@section('content')




<form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data"> 
    @csrf


    <div class="col-sm-3 mt-4 mb-4">
        <input type="text" name="user_id" value="{{ $authUser->id }}" hidden >
        <h2 class="text-decoration-underline text-muted">Author: {{ $authUser->name }}</h2>
    </div>

    <div class="mb-4">
    <label for ="title" >Post title </label>
    <input type ="text" class="form-control w-50" name="title" />
    
    </div>
    
    <div class="mb-4 mt-4">
    <label for ="body">Post body </label>
    <textarea type ="text" class="form-control w-50" name="body" rows="5"> </textarea>
    </div>

    <input type="file" name="image" class="form-control w-50 mb-4"/> 

    <input type ="submit" class="btn btn-success form-control w-25" name="submit"  value="submit" />
</form>

@endsection