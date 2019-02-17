<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $primaryKey = "TrackId";
    public $timestamps = false;

    public function playlists(){
      return $this->belongsToMany("App\Playlist", "playlist_track", "TrackId", "PlaylistId");
      //what this does: there's a many-to-many relationship between Track and Playlist, via the join table playlist_track, with the primary/foreign relationship of TrackId and PlaylistId
      // the order of the last two arguments matters!
    }

    public function genre(){
      return $this->belongsTo("App\Genre", "GenreId");
    }
}
