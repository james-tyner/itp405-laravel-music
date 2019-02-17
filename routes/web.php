<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('invoices');
// });

Route::get("/maintenance", "ConfigsController@maintenance");

Route::get("/login", "LoginController@index");
Route::post("/login", "LoginController@login");
Route::get("/logout", "LoginController@logout");

Route::middleware(['maintenanceCheck'])->group(function(){
  Route::get('/', 'PlaylistController@index');
  Route::get("/playlists/new", "PlaylistController@create");
  Route::get("/playlists/{playlistId}", "PlaylistController@index");
  Route::post("/playlists","PlaylistController@store"); //this is for any POST request sent to /playlists

  Route::get("/signup", "SignupController@index");
  Route::post("/signup", "SignupController@signup");
});

Route::middleware(['authenticated'])->group(function(){
  //What this logic does (since we set up an auth check and redirect in the middleware) is define pages that can only be reached if the user is logged in
  Route::get("/profile", "AdminController@index");
  Route::get('/invoices', 'InvoicesController@index');

  Route::get("/settings", "ConfigsController@index");
  Route::post("/settings", "ConfigsController@toggle");
});

//The order of the routes matters. So for playlists/new, it'll use the create view first and if that doesn't work it'll try the index view
