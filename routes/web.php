<?php

Route::get('/', 'mainController@index');


Route::get('/article/{id}','articleController@view');
Route::get('/articleCreate','articleController@create')->middleware('isAdmin');
Route::post('/articleCreate','articleController@createPost')->middleware('isAdmin');
Route::get('/articleEdit/{id}','articleController@edit')->middleware('isAdmin');
Route::post('/articleEdit','articleController@editPost')->middleware('isAdmin');
Route::get('/categorie/{id}','mainController@categoriesView');
Route::get('/articleCatalog','articleController@catalog');
Route::get('/articleCatalog/categorie/{id}','articleController@catalogCategorie');
Route::get('/article/delete/{id}','articleController@delete')->middleware('isAdmin');
Route::post('/search','articleController@search');


Route::get('/contacts', 'mainController@contacts');
Route::post('/send','mainController@send');
Route::get('/about', 'mainController@about');

//Роут для комментариев
Route::post('comment', 'CommentController@store')->name('comment');
Route::any('commentDelete', 'CommentController@delete')->middleware('isAdmin');

//Роут uLogin
Route::post('ulogin','uLoginController@login');


//Роуты с админки
Route::get('/admin/aboutMeEdit',function (){
   return view('editor.aboutMeEdit');
});
Route::post('/admin/aboutMeEdit','adminController@aboutMeEditPost')->middleware('isAdmin');
Route::post('/admin/socialEdit','adminController@socialEditPost')->middleware('isAdmin');
Route::get('/admin/articles','adminController@articlesCatalog')->middleware('isAdmin');
Route::get('/admin/categories','adminController@categories')->middleware('isAdmin');
Route::get('/admin/aboutMePageEdit','adminController@aboutMePageEdit')->middleware('isAdmin');
Route::post('/admin/aboutMePageEdit','adminController@aboutMePagePost')->middleware('isAdmin');







Auth::routes();

Route::get('logout', function (){
    auth::logout();
    return redirect('/');
});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
