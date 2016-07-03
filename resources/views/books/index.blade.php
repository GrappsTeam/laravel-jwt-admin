@extends('layouts.app')

@section('title') Books @stop

@section('content')

<div class="col-lg-10 col-lg-offset-1">

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    <h1><i class="fa fa-users"></i> Books List <a href="/logout" class="btn btn-default pull-right">Logout</a></h1>
      <div style="padding: 20px;" class="add-new-wrap">
        <a href="/books/create" class="btn btn-success">Add Book</a>
      </div>


      <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author Name</th>
                    <th>Page Count</th>
                    <th>User ID</th>

                    <th>Edit</th>
                  <th>Delete</th>
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
                        <a href="/books/{{ $book->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                
                    </td>
                  <td>{{Form::open(array('method'=>'DELETE', 'route' => array('books.destroy', $book->id), 'id' => "formDelete"))}}
                    {{Form::submit('Delete', array('class'=>'btn btn-danger'))}}
                    {{Form::close()}}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>


</div>

<div id="confirmdelete" class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Wait</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this book?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        <button id="delete" type="button" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>

    $("#formDelete").submit(function (e) {
      alert('shit');
//      var x = confirm("Are you sure you want to delete?");
//      if (x) {
//        return true;
//      }
//      else {

        e.preventDefault();
        return false;
//      }

    });

//
//    jQuery('form').submit(function(e){
//      e.preventDefault();
//      console.log($('form').submit);
//      var url = jQuery(this).attr('action');
//      console.log(url);
//      jQuery('#confirmdelete').modal({ backdrop: 'static', keyboard: false })
//        .one('click', '#delete', function() {
//
//          });
//        });
//      // .one() is NOT a typo of .on()
//
//
////
//    });



</script>
@stop
