<?php

namespace App\Http\Controllers;

use App\article;
use App\categorie;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class articleController extends Controller
{
    private function makeUrlVideo($str){
       //<iframe width="854" height="480" src="https://www.youtube.com/embed/LYg26_LBlZ8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        $mass = explode(" ", $str);
        foreach ($mass as $m){
            if(stristr($m, 'src="') == TRUE) {
               $str = stristr($m,"\"");
               $str = substr($str,1);
               $str = stristr($str,"\"",true);
               return $str;
            }
        }
    }

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
        if (isset($request->checkType)){
            if ($request->video != '') {
                $path = $this->makeUrlVideo($request->video);
                $path = $path . '?rel=0&amp;showinfo=0';

            }else{
                $path = '';
            }
                article::create([
                    'user_id' => $request->user_id,
                    'title' => $request->title,
                    'categorie_id' => $request->categorie_id,
                    'text' => $request->text,
                    'image' => $path,
                ]);

        }else {
            $path = Storage::disk('public')->put('uploads', $request->image);
            $path = '/storage/' . $path;
            article::create([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'categorie_id' => $request->categorie_id,
                'text' => $request->text,
                'image' => $path,
            ]);
        }
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

        Comment::where('article_id',$id)->delete();
        article::destroy($id);
        $articles = article::orderBy('created_at','DESC')->paginate(30);
        return view('admin.articleCatalogAdmin', ['articles'=>$articles]);
    }

    public function edit($id){
        $article =  article::find($id);
        $categories = categorie::all();
        return view('editor.articleEdit',['article'=>$article,'categories'=>$categories]);
    }

    public function editPost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'categorie_id' => 'required',
            'text' => 'required'
        ]);
        $article = article::find($request->article_id);
        if (isset($request->checkType)) {

            if ($request->video != '') {
                $path = $this->makeUrlVideo($request->video);
                $path = $path . '?rel=0&amp;showinfo=0';

            } else {
                $path = '';
            }
            $article->update([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'categorie_id' => $request->categorie_id,
                'text' => $request->text,
                'image' => $path,
            ]);


        } else {

            if (isset($request->image)) {

                $path = Storage::disk('public')->put('uploads', $request->image);
                $path = '/storage/' . $path;
                $article->update([
                    'user_id' => $request->user_id,
                    'title' => $request->title,
                    'categorie_id' => $request->categorie_id,
                    'text' => $request->text,
                    'image' => $path,
                ]);

            } else {

                $article->update([
                    'user_id' => $request->user_id,
                    'title' => $request->title,
                    'categorie_id' => $request->categorie_id,
                    'text' => $request->text,
                ]);
            }
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
