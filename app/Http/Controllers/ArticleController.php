<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        return view('index');
    }

    public function single($articleId){
        $data['id'] = $articleId;
        return view('single', $data);
    }

    public function post(){
        $data['article']= \request()->except('_token');
        return view('index', $data);
    }


    public function delete($by, $value){
        return "Deleted Data by $by, with value $value";
    }


}

