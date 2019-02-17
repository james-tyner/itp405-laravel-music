<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
  protected $primaryKey = "PlaylistId";
  public $timestamps = false;

  public function tracks(){
    return $this->belongsToMany("App\Playlist", "playlist_track", "PlaylistId", "TrackId");
    //what this does: there's a many-to-many relationship between Track and Playlist, via the join table playlist_track, with the primary/foreign relationship of PlaylistId and TrackId
    // the order of the last two arguments matters!
  }
}
