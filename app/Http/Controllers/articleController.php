<?php

namespace App\Http\Controllers;

use App\article;
use App\categorie;
use App\Comment;
use App\User;
use Illuminate\Http\Request;

class articleController extends Controller
{
    public function view($id){

        $articleV = article::find($id);
        $articleViews = $articleV->views;
        $articleViews = $articleViews + 1;
        $articleV -> views = $articleViews;
        $articleV ->save();


        $articlesAll = article::all();
        $articles = article::find($id);
        $id = $articles->id;
        $cc = count(Comment::where('article_id',$id)->get());
        return view('articleView',['articles'=>$articles,'id'=>$id, 'cc'=>$cc, 'articlesAll'=>$articlesAll,'articleViews'=>$articleViews]);
    }

    public function create(){
        $categories = categorie::all();
        return view('editor.articleCreate',['categories'=>$categories]);
    }

    public function createPost(Request $request){
        $this->validate($request, [
            'title' =>'required|max:50',
            'categorie_id' =>'required',
            'text' =>'required'
        ]);

//
        $file = public_path().'\\uploads\\'.$_FILES['image']['name'];
        $ff = '\\uploads\\'.$_FILES['image']['name'];
        $tmp_name = $_FILES["image"]["tmp_name"];
        move_uploaded_file($tmp_name, $file);
        article::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'categorie_id' => $request->categorie_id,
            'text' => $request->text,
            'image' => $ff,
        ]);


        return redirect('/');
    }
}
