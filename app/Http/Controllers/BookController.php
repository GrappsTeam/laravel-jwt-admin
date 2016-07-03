<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Book;
use View;
use Session;
use Redirect;

class BookController extends Controller
{
    public function __construct()
  {
    
  }

  /**
   * Display a listing of the Book.
   *
   * @return Response
   */
  public function index()
  {
    $books = Book::all();

    return View::make('books.index', ['books' => $books]);
  }

  /**
   * Show the form for creating a new Book.
   *
   * @return Response
   */
  public function create()
  {
    return View::make('books.create');
  }

  /**
   * Store a newly created Book in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'title' => 'required|max:255',
      'author_name' => 'required',
    ]);
    $book = new Book;

    $book->title  = $request->title;
    $book->author_name = $request->author_name;
    $book->pages_count = $request->pages_count;

    $book->save();

    Session::flash('flash_message', 'Task successfully added!');


    return Redirect::to('/books');
  }


  public function show($id)
  {
    $book = Book::findOrFail($id);

    return View::make('books.show', [ 'book' => $book ]);

  }


  /**
   * Show the form for editing the specified Book.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $book = Book::findOrFail($id);

    return View::make('books.edit', [ 'book' => $book ]);
  }

  /**
   * Update the specified Book in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id, Request $request)
  {
    $book = Book::findOrFail($id);

    $this->validate($request, [
      'title' => 'required',
      'author_name' => 'required'
    ]);

    $input = $request->all();

    $book->fill($input)->save();

    Session::flash('flash_message', 'Book successfully Edited!');

    return Redirect::to('/books');
  }

  /**
   * Remove the specified Book from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    book::destroy($id);

    return Redirect::to('/books');
  }

}
