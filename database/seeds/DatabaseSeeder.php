<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('users')->delete();
        DB::table('books')->delete();




        $users = array(
          ['name' => 'Jhonny Cohen', 'email' => 'codejhonny@gmail.com', 'password' => Hash::make('secret')],
          ['name' => 'Chris Sevilleja', 'email' => 'chris@scotch.io', 'password' => Hash::make('secret')],
          ['name' => 'Holly Lloyd', 'email' => 'holly@scotch.io', 'password' => Hash::make('secret')],
          ['name' => 'James Hetfield', 'email' => 'james@grapps.io', 'password' => Hash::make('secret')],
          ['name' => 'Ran Glait', 'email' => 'sranga@gmail.com', 'password' => Hash::make('secret')],

        );

        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }



        $books = array(
          ['title' => 'Michael Strogoff', 'author_name' => 'Jules Verne', 'pages_count' => '252'],
          ['title' => 'Alex Sears', 'author_name' => 'The Database', 'pages_count' => '123'],
          ['title' => 'Mighty Mouse', 'author_name' => 'Joe Coffee', 'pages_count' => '252'],
          ['title' => 'Jungle Jim', 'author_name' => 'Jimmy Huppa', 'pages_count' => '343'],
          ['title' => 'Michael Boktesky Tales', 'author_name' => 'Michael Boktesky', 'pages_count' => '252'],
        );

        // Loop through each user above and create the record for them in the database
        foreach ($books as $book)
        {
            Book::create($book);
        }
        Model::reguard();
    }


}