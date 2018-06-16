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

    public function catalog(){
        $articles = article::orderBy('created_at','DESC')->paginate(30);
        $title = "Каталог статей";
        return view('articleCatalog', ['articles'=>$articles,'title'=>$title]);
    }

    public function catalogCategorie($id){
        $articles = article::orderBy('created_at','DESC')->where('categorie_id',$id)->paginate(30);
        $cat = categorie::find($id);
        $cat = $cat->name;
        $title = "Статьи с категорией $cat";
        return view('articleCatalog', ['articles'=>$articles,'title'=>$title]);
    }

    public function delete($id){
        article::destroy($id);
        $articles = article::orderBy('created_at','DESC')->paginate(30);
        return view('admin.articleCatalogAdmin', ['articles'=>$articles]);
    }

    public function edit($id){
        $article =  article::find($id);
        $categories = categorie::all();
        return view('editor.articleEdit',['article'=>$article,'categories'=>$categories]);
    }

    public function editPost(Request $request){
        $this->validate($request, [
            'title' =>'required|max:50',
            'categorie_id' =>'required',
            'text' =>'required'
        ]);
        $article = article::find($request->article_id);
        if (isset($request->image)){
            $file = public_path().'\\uploads\\'.$_FILES['image']['name'];
            $ff = '\\uploads\\'.$_FILES['image']['name'];
            $tmp_name = $_FILES["image"]["tmp_name"];
            move_uploaded_file($tmp_name, $file);
            $article->update([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'categorie_id' => $request->categorie_id,
                'text' => $request->text,
                'image' => $ff,
            ]);
        }else{
            $article->update([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'categorie_id' => $request->categorie_id,
                'text' => $request->text,
            ]);
        }
        return redirect('/admin/articles');
    }

    public function search(Request $request){
        $articles = article::where('title','LIKE',"%$request->srch%")->orWhere('text','LIKE',"%$request->srch%")->paginate(30);
        if ($articles){
            $title = "Поиск по фразе: $request->srch";
        }else{
            $title = "По фразе: \"$request->srch\" ничего не найдено ";
        }
        return view('articleCatalog',['articles'=>$articles,'title'=>$title]);
    }


}
