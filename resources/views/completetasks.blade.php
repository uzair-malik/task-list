@extends('layouts.layout')
@section('title')
<h4 class="mt-3 mb-3">All Tasks</h4>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@endsection
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Long Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach ($tasks as $task)
<tr>
      <th scope="row">{{$task->id}}</th>
      <td>{{$task->name}}</td>
      <td>{{$task->description}}</td>
      <td>{{$task->long_description}}</td>
      <td><a href="{{ route("modify", ['id' => $task->id]) }}">Edit</a> |
      <a href="{{ route("destroy", ['id' => $task->id]) }}">Delete</a></td>

</tr>
@endforeach

</tbody>
</table>

  <p>  {{ $tasks->links() }}</p>

@endsection
