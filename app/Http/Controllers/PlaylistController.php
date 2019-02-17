<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class PlaylistController extends Controller {
  public function index($playlistId = null){ //if there's no URI param, the value is null
    $playlists = DB::table('playlists')->get();

    if($playlistId){ //this will work because no playlist has id 0
      $tracks = DB::table('tracks')
        ->join('playlist_track', 'tracks.TrackId', '=', 'playlist_track.TrackId')
        ->where('PlaylistId', '=', $playlistId)
        ->get();
    } else {
      $tracks = [];
    }

    return view('playlist.index', [ // corresponds to a view called index in the playlist folder in views
      'playlists'=>$playlists,
      'tracks'=>$tracks
    ]);
  }

  /*
  public function show($playlistId){ //$id here comes from the value in the route in web.php
    // in Laravel, dd(whatever) = var_dump(whatever) and die;
    // dd($playlistId);


  }
  */

  public function create(){
    return view('playlist.create');
  }

  public function store(Request $request){
    // validate the new playlist name
    $input = $request->all();
    $validation = Validator::make($input, [
      'name'=>'required|min:5|unique:playlists,Name' //this corresponds to the 'name' field from the form and we're defining rules for the field. It's required, has a minimum length of 5, and must be unique (not match anything in the Name column of playlists table)
    ]);

    //if validation fails, redirect back to form with an error message
    if ($validation->fails()){
      return redirect("/playlists/new")
        ->withErrors($validation)
        ->withInput();
    }

    // else: insert playlists into DB
    DB::table("playlists")->insert([
      "Name"=>$request->name //grabs name from request and adds it to Name column of playlists
    ]);

    // redirect back to /playlists
    return redirect("/playlists"); //redirect is a Laravel thing
  }
}
