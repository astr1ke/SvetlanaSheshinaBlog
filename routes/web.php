<?php

Route::get('/', 'mainController@index');


Route::get('/article/{id}','articleController@view');
Route::get('/articleCreate','articleController@create');
Route::post('/articleCreate','articleController@createPost');
Route::get('/articleCreate/{id}','articleController@edit');
Route::post('/articleCreate/{id}','articleController@editPost');

//Роут для комментариев
Route::post('comment', 'CommentController@store')->name('comment');
Route::any('commentDelete', 'CommentController@delete');



Route::get('/about', function (){
    return view('about');
});
Route::get('/articleCatalog', function (){
    return view('articleCatalog');
});
Route::get('/galary', function (){
    return view('galary');
});
Route::get('/file', function (){
    return view('file');
});
Route::get('/admin/aboutMeEdit',function (){
   return view('editor.aboutMeEdit');
});
Route::post('/admin/aboutMeEdit','adminController@aboutMeEditPost');


Auth::routes();

Route::get('logout', function (){
    auth::logout();
    return redirect('/');
});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
