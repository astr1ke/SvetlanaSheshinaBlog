<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;

class mainController extends Controller
{
    public function index(){
        $articles = article::orderBy('id','DESC')->paginate(5);
        return view('main',['articles'=>$articles]);
    }

    public function categoriesView($id){
        $articles = article::where('categorie_id',$id)->orderBy('id','DESC')->paginate(5);
        return view('main',['articles'=>$articles]);
    }
}
