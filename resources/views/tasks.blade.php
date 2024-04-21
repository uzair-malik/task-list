@extends('layouts.layout')
@section('title')
<h4 class="mt-3 mb-3">Add Task</h4>
@endsection
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@section('content')
<form method='POST' action={{route('add')}}>
@csrf
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Task Name</label>
  <input type="email" class="form-control" value="{{ old('taskname') }}" name='taskname' id="exampleFormControlInput1" placeholder="name@example.com">
  @if ($errors->has('taskname'))
    <div class="alert alert-danger">{{ $errors->first('taskname') }}</div>
@endif
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Task Description</label>
  <textarea class="form-control" name='description' id="exampleFormControlTextarea1" rows="3"></textarea>
  @if ($errors->has('description'))
    <div class="alert alert-danger mt-2">{{ $errors->first('description') }}</div>
@endif
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Long Description</label>
  <textarea class="form-control" name='long_description' id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<div class="mb-3">
    <button class="btn btn-primary" type="submit">Add Task</button>
  </div>
<form>
@endsection
