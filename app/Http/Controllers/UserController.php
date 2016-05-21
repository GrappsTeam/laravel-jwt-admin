<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use View;

class UserController extends Controller
{
    public function __construct()
  {
    
  }

  /**
   * Display a listing of the user.
   *
   * @return Response
   */
  public function index()
  {
    $users = User::all();

    return View::make('users.index', ['users' => $users]);
  }

  /**
   * Show the form for creating a new user.
   *
   * @return Response
   */
  public function create()
  {
    return View::make('users.create');
  }

  /**
   * Store a newly created user in storage.
   *
   * @return Response
   */
  public function store()
  {
    $user = new User;

    $user->name  = Input::get('name');
    $user->email      = Input::get('email');
    $user->password   = Hash::make(Input::get('password'));

    $user->save();

    return Redirect::to('/users');
  }

  /**
   * Show the form for editing the specified user.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $user = User::find($id);

    return View::make('users.edit', [ 'user' => $user ]);
  }

  /**
   * Update the specified user in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    $user = User::find($id);

    $user->name = Input::get('name');
    $user->email      = Input::get('email');
    $user->password   = Hash::make(Input::get('password'));

    $user->save();

    return Redirect::to('/users');
  }

  /**
   * Remove the specified user from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    User::destroy($id);

    return Redirect::to('/users');
  }

}
