@extends('layouts.app')

@section('title') Books @stop

@section('content')
  <div class="col-sm-6 col-sm-offset-3">


    @if(Session::has('flash_message'))
      <div class="alert alert-success">
        {{ Session::get('flash_message') }}
      </div>
    @endif


  <h1>Add a New Book</h1>
  <p class="lead">Add a book to your list of books</p>
  <hr>
      @include('partials.alerts.errors')


  {!! Form::open([
    'route' => 'books.store'
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
    {!! Form::label('pages_count', 'Page Count:', ['class' => 'control-label']) !!}
    {!! Form::number('pages_count', null, ['class' => 'form-control']) !!}
  </div>


      {!! Form::submit('Create New Book', ['class' => 'btn btn-primary']) !!}

  {!! Form::close() !!}

</div>
@stop