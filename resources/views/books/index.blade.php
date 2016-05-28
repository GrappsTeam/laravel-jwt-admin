@extends('layouts.app')

@section('title') Books @stop

@section('content')

<div class="col-lg-10 col-lg-offset-1">

    <h1><i class="fa fa-users"></i> Books List <a href="/logout" class="btn btn-default pull-right">Logout</a></h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author Name</th>
                    <th>Page Count</th>
                    <th>User ID</th>

                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author_name }}</td>
                    <td>{{ $book->pages_count }}</td>
                    <td>{{ $book->user_id}}</td>
                    <td>
                        <a href="/user/{{ $book->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="/user/create" class="btn btn-success">Add Book</a>

</div>

@stop
