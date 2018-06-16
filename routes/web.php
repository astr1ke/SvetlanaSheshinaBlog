<?php

Route::get('/', 'mainController@index');


Route::get('/article/{id}','articleController@view');
Route::get('/articleCreate','articleController@create');
Route::post('/articleCreate','articleController@createPost');
Route::get('/articleEdit/{id}','articleController@edit');
Route::post('/articleEdit','articleController@editPost');
Route::get('/categorie/{id}','mainController@categoriesView');
Route::get('/articleCatalog','articleController@catalog');
Route::get('/articleCatalog/categorie/{id}','articleController@catalogCategorie');
Route::get('/article/delete/{id}','articleController@delete');
Route::post('/search','articleController@search');


Route::get('/contacts', 'mainController@contacts');
Route::post('/send','mainController@send');
Route::get('/about', 'mainController@about');

//Роут для комментариев
Route::post('comment', 'CommentController@store')->name('comment');
Route::any('commentDelete', 'CommentController@delete');

//Роут uLogin
Route::post('ulogin','uLoginController@login');


//Роуты с админки
Route::get('/admin/aboutMeEdit',function (){
   return view('editor.aboutMeEdit');
});
Route::post('/admin/aboutMeEdit','adminController@aboutMeEditPost');
Route::post('/admin/socialEdit','adminController@socialEditPost');
Route::get('/admin/articles','adminController@articlesCatalog');
Route::get('/admin/categories','adminController@categories');
Route::get('/admin/aboutMePageEdit','adminController@aboutMePageEdit');
Route::post('/admin/aboutMePageEdit','adminController@aboutMePagePost');







Auth::routes();

Route::get('logout', function (){
    auth::logout();
    return redirect('/');
});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
