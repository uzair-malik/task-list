@extends('layouts.layout')
@section('title')
<h4 class="mt-3 mb-3">Modify Task</h4>
<a href="{{ route('allTasksOverview') }}" class="btn btn-secondary">&larr; Back</a>
@endsection

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@section('content')
<form method='POST' action={{route('modifycatcher',['id'=>$task->id])}}>
@method('PUT')   
@csrf
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Task Name</label>
  <input type="text" class="form-control" value="{{ $task->name }}" name='name' id="exampleFormControlInput1" placeholder="name@example.com">
  @if ($errors->has('name'))
    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
@endif
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Task Description</label>
  <textarea class="form-control" name='description' id="exampleFormControlTextarea1" rows="3">{{ $task->description }}</textarea>
  @if ($errors->has('description'))
    <div class="alert alert-danger mt-2">{{ $errors->first('description') }}</div>
@endif
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Long Description</label>
  <textarea class="form-control" name='long_description' id="exampleFormControlTextarea1" rows="3">{{ $task->long_description }}</textarea>
</div>
<div class="mb-3">
    <button class="btn btn-primary" type="submit">Modify Task</button>
  </div>
<form>
@endsection
