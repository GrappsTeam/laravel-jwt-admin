<?php
	
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

	$api->post('auth/login', 'App\Api\V1\Controllers\AuthController@login');
	$api->post('auth/signup', 'App\Api\V1\Controllers\AuthController@signup');
	$api->post('auth/recovery', 'App\Api\V1\Controllers\AuthController@recovery');
	$api->post('auth/reset', 'App\Api\V1\Controllers\AuthController@reset');

	// example of protected route
	$api->get('protected', ['middleware' => ['api.auth'], function () {		
		return \App\User::all();
    }]);

	// example of free route
	$api->get('free', function() {
		return \App\User::all();
	});


	$api->get('freebooks',function() {
		return \App\Book::all();
	});

$api->group(['middleware' => 'api.auth'], function ($api) {
	$api->get('books', 'App\Api\V1\Controllers\BookController@index');
	$api->get('books/{id}', 'App\Api\V1\Controllers\BookController@show');
	$api->post('books', 'App\Api\V1\Controllers\BookController@store');
	$api->put('books/{id}', 'App\Api\V1\Controllers\BookController@update');
	$api->delete('books/{id}', 'App\Api\V1\Controllers\BookController@destroy');
});


/// this line can replace all of the "book methods from above"
/// $api->resource('books', 'App\Api\V1\Controllers\BookController');

// Token
// eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE2LCJpc3MiOiJodHRwOlwvXC9kZXYuYWRtaW5cL2FwaVwvYXV0aFwvbG9naW4iLCJpYXQiOjE0NjQzNDI5ODIsImV4cCI6MTQ2NDM0NjU4MiwibmJmIjoxNDY0MzQyOTgyLCJqdGkiOiIyMWM5YjhhODEzZmM0Y2ViZGU5MDNjN2Q4ZDhjOGNlZiJ9.pjX8kCJ0PnuKmjEaXI9K3IHs9DwTmaKBoN1a5sDzeos

});
