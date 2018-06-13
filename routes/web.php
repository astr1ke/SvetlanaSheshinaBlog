<?php

Route::get('/', 'mainController@index');


Route::get('/article/{id}','articleController@view');
Route::get('/articleCreate','articleController@create');
Route::post('/articleCreate','articleController@createPost');
Route::get('/articleCreate/{id}','articleController@edit');
Route::post('/articleCreate/{id}','articleController@editPost');
Route::get('/categorie/{id}','mainController@categoriesView');

//Роут для комментариев
Route::post('comment', 'CommentController@store')->name('comment');
Route::any('commentDelete', 'CommentController@delete');

//Роут uLogin
Route::post('ulogin','uLoginController@login');


Route::get('/about', function (){
    return view('about');
});
Route::get('/articleCatalog', function (){
    return view('articleCatalog');
});
Route::get('/gallery', function (){
    return view('gallery');
});
Route::get('/files', function (){
    return view('files');
});



Route::get('/admin/aboutMeEdit',function (){
   return view('editor.aboutMeEdit');
});
Route::post('/admin/aboutMeEdit','adminController@aboutMeEditPost');
Route::post('/admin/socialEdit','adminController@socialEditPost');






Auth::routes();

Route::get('logout', function (){
    auth::logout();
    return redirect('/');
});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
