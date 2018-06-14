<?php

namespace App\Http\Controllers;

use App\aboutMe;
use App\aboutMePage;
use Illuminate\Http\Request;
use App\article;
use Illuminate\Support\Facades\Mail;

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

    public function contacts(){
        return view('contacts');
    }

    public function send(Request $request){
        $this->validate($request,[
            'name'=> 'required|min:3|max:20',
            'subject' =>'required|max:20',
            'email' => 'required',
            'text' =>'required|min:3|max:255',
        ]);

        Mail::raw('От: '.$request->email.' Сообщение:  '.$request->text, function($message) use ($request){
            $message->from($request->email, $request->name);
            $message->to('mail.usa.va@gmail.com')->subject($request->subject);
        });

        return view('contacts',['done'=>True]);
    }

    public function about(){
        $aboutMe = aboutMePage::find(1);
        return view('aboutMePage',['aboutMe'=>$aboutMe]);
    }
}
