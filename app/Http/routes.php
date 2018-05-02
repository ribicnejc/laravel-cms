<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return "Hi about page!";
});

Route::get('/contact', function () {
    return "Hi I am contact";
});

Route::get('/post/{id}/{name}', function ($id, $name) {
   return  $id . " " . $name;
});

Route::get('admin/posts/example', array('as' => 'admin.home' ,function () {
    $url = route('admin.home');
    return "This url is " . $url;
}));
//
Route::get('/post/{id}', 'PostsController@index');
//
Route::resource('posts', 'PostsController');

Route::get('/contact', 'PostsController@contact');

Route::get('post/{id}/{name}/{password}', 'PostsController@show_post');





//Database Raw SQL Queries
Route::get('/read', function () {
    $results = DB::select('select * from posts where id = ?', [1]);

    return $results;
});


//Application routes
use Illuminate\Support\Facades\DB;

Route::get('/insert', function () {
    DB::insert('insert into posts (title, content) values(?, ?)', ["PHP with laravel", "Laravel is the best thing that has happened to php"]);
});


Route::get('/update', function() {
    $updated = DB::update('update posts set title="Update title" where id = ?', [1]);
    return $updated;
});

Route::get('/delete', function() {
   $deleted = DB::delete('delete from posts where id = ?', [1]);
   return $deleted;
});


///------------------------------------
Route::group(['middleware' => ['web']], function () {


});