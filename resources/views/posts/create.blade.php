@extends('layouts.main')

@section('title', 'blog')

@section('content')

<form action="{{route('posts.store')}}" method="POST"> 
    @csrf

    <div class="mb-4">
    <label for ="title" >Post title </label>
    <input type ="text" class="form-control w-50" name="title" />
    
    </div>
    
    <div class="form-group">
      <label for="user_id">Choose a publisher</label>

      <select class="form-control w-50" id="user_id" name="user_id">
          @foreach($users as $user)
          <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach
      </select>
  </div>

    <div class="mb-4 mt-4">
    <label for ="body">Post body </label>
    <textarea type ="text" class="form-control w-50" name="body" rows="5"> </textarea>
    </div>

    <input type ="submit" class="btn btn-primary" name="submit" value="submit" />
</form>

@endsection