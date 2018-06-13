<?php

namespace App\Http\Controllers;

use App\aboutMe;
use App\social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    public function aboutMeEditPost(Request $request){
        $aboutMe = aboutMe::find(1);
        if (isset($request->foto)){
            $path = Storage::disk('public')->put('avatars',$request->foto);

            $aboutMe->update([
                'foto'=>$path,
                'name'=>$request->name,
                'title'=>$request->title,
                'text'=>$request->text,
            ]);
        }
        else{
            $aboutMe->update([
                'name'=>$request->name,
                'title'=>$request->title,
                'text'=>$request->text,
            ]);
        }
        return redirect('/admin/aboutMeEdit');
    }

    public function socialEditPost(Request $request){
        $social = social::find(1);
        $social->update([
            'ok'=>$request->ok,
            'vk'=>$request->vk,
            'inst'=>$request->inst,
            'utub'=>$request->utub,
        ]);
        return redirect('/admin/aboutMeEdit');
    }
}
