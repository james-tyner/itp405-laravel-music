<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
  protected $primaryKey = "GenreId";
  public $timestamps = false;

  public function tracks(){
    return $this->hasMany("App\Track", "GenreId"); //tells it which key in the track associates to the genre
  }
}
