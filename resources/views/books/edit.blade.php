@extends('layouts.app')

@section('content')
  <div class="col-sm-6 col-sm-offset-3">

  <h1>Editing "{{ $book->title }}"</h1>
  <p class="lead">Edit and save this task below, or <a href="{{ route('books.index') }}">go back to all tasks.</a></p>
  <hr>

  @include('partials.alerts.errors')

  @if(Session::has('flash_message'))
    <div class="alert alert-success">
      {{ Session::get('flash_message') }}
    </div>
  @endif

  {!! Form::model($book, [
      'method' => 'PATCH',
      'route' => ['books.update', $book->id]
  ]) !!}

  <div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('author_name', 'Author Name:', ['class' => 'control-label']) !!}
    {!! Form::textarea('author_name', null, ['class' => 'form-control']) !!}
  </div>

    <div class="form-group">
      {!! Form::label('pages_count', 'Pages Count:', ['class' => 'control-label']) !!}
      {!! Form::number('pages_count', null, ['class' => 'form-control']) !!}
    </div>

  {!! Form::submit('Update Task', ['class' => 'btn btn-primary']) !!}

  {!! Form::close() !!}
</div>
@stop