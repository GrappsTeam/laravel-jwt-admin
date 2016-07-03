@extends('layouts.app')

@section('content')
  <div class="col-lg-10 col-lg-offset-1">

  <h1>{{ $book->title }}</h1>
  <p class="lead">{{ $book->author_name }}</p>
  <p class="lead">{{ $book->pages_count }}</p>

  <hr>

  <a href="{{ route('books.index') }}" class="btn btn-info">Back to all tasks</a>
  <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit Task</a>

  <div class="pull-right">
    <a href="#" class="btn btn-danger">Delete this task</a>
  </div>
</div>
@stop