<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Book;
use View;

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
  public function store()
  {
    $book = new Book;

    $book->title  = Input::get('title');
    $book->author_name      = Input::get('author_name');
    $book->pages_count   = Hash::make(Input::get('pages_count'));

    $book->save();

    return Redirect::to('/books');
  }

  /**
   * Show the form for editing the specified Book.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $book = Book::find($id);

    return View::make('books.edit', [ 'book' => $Book ]);
  }

  /**
   * Update the specified Book in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    $book = Book::find($id);

    $book->title = Input::get('title');
    $book->author_name      = Input::get('author_name');
    $book->pages_count   = Hash::make(Input::get('pages_count'));

    $book->save();

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
