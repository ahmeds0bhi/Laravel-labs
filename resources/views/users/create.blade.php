@extends('layouts.main')

@section('title', 'blog')
    
@section('content')

<form method="POST" action="{{route('users.store')}}">
  @csrf
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="name">
  </div>

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email address</label>
    <input type="email" class="form-control w-50" id="exampleFormControlInput1" name="email">
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>

</form>

@endsection