<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;

class mainController extends Controller
{
    public function index()
    {
        $articles = article::all();
        return view('main',['articles'=>$articles]);
    }
}
