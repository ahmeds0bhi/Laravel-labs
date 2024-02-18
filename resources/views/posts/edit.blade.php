@extends('layouts.main')

@section('title', 'blog')

@section('content')

<form method="POST" action="{{ route('posts.update', ['id'=>$post['id']], false) }}"> 
    @csrf
    @method('PUT')

    <div class="mb-4">
    <label for ="title" >Post title </label>
    <input type ="text" class="form-control w-50" name="title" value="{{ $post->title }}" />
    
    </div>
    
    {{-- <div class="form-group">
      <label for="user_id">Choose a publisher</label>

      <select class="form-control w-50" id="user_id" name="user_id">
          @foreach($users as $user)
          <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach
      </select>
  </div> --}}

  <div class="col-sm-3 mt-4">
    <input type="text" name="user_id" value="{{ $authUser->id }}" hidden >
    <h4>Author: {{ $authUser->name }}</h4>
</div>

    <div class="mb-4 mt-4">
    <label for ="body">Post body </label>
    <textarea type ="text" class="form-control w-50" name="body" rows="5">{{ $post->body }}</textarea>
    </div>

    <input type ="submit" class="btn btn-primary" name="submit" value="submit" />
</form>

@endsection