<?php

namespace App\Http\Controllers;

use App\aboutMe;
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
}
