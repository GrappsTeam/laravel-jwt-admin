@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">User List</div>
        <div class="panel-body">

        <div class="table-responsive">
          <table class="table table-bordered table-striped">

            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Date/Time Added</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($users as $user)
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                <td>
                  <a href="/user/{{ $user->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div><!-- panel body -->
    </div> <!-- panel default -->


    

      <div class="panel panel-default">
        <div class="panel-heading">Books List</div>
        <div class="panel-body">

          <div class="table-responsive">
            <table class="table table-bordered table-striped">

              <thead>
                <tr>
                  <th>Title</th>
                  <th>Author Name</th>
                  <th>Page Count</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                  @foreach ($books as $book)
                  <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author_name }}</td>
                    <td>{{ $book->pages_count }}</td>
                    <td>
                      <a href="/user/{{ $book->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>

      </div><!-- panel body -->
    </div> <!-- panel default -->


    
  </div>
</div>
@endsection
