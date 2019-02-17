<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $primaryKey = "ArtistId"; //by default, Eloquent looks for a primary key called id
    public $timestamps = false; //by default, Eloquent has timestamps as part of every DB
}
