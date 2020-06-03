<?php

namespace App\Http\Controllers;



use App\Album;
use App\Artist;
use App\Listener;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use DB;


class ArtistController extends Controller
{


    public function show(Artist $artist, Album $album){
        dd($album);
    }
}


