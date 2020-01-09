<?php
Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/worker', 'Auth\LoginController@showWorkerLoginForm');
Route::get('/login/client', 'Auth\LoginController@showClientLoginForm');
Route::get('/register/worker', 'Auth\RegisterController@showWorkerRegisterForm');
Route::get('/register/client', 'Auth\RegisterController@showClientRegisterForm');

Route::post('/login/worker', 'Auth\LoginController@workerLogin');
Route::post('/login/client', 'Auth\LoginController@clientLogin');
Route::post('/register/worker', 'Auth\RegisterController@createWorker');
Route::post('/register/client', 'Auth\RegisterController@createClient');

    //Homes persons
Route::view('/home', 'home')->middleware('auth');
Route::view('/worker', 'worker');
Route::view('/client', 'client');

    //admins
Route::get('/general-admin',function(){
    return view('managers.generalManager.dashboard');
});
Route::get('/general-admin/workers',function(){
    return view('managers.generalManager.workers.index');
});