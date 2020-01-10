<?php
Route::view('/', 'home')->middleware('auth');
Auth::routes();
//Proceso login - Registro
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
Route::view('/client', 'clients.client');
Route::view('/worker','managers.areaManager.worker');

Route::get('/test',function(){
    $role = App\User::findOrFail(1);
    return $role->roles();
});

    //admins
            Route::group(['prefix'=>'admin'],function(){
                    //Super
                Route::get('super',function(){
                    return view('managers.generalManager.dashboard');
                })/* ->middleware('auth') */;
                Route::group(['prefix'=>'super'],function(){
                    Route::get('workers',function(){
                        return view('managers.generalManager.workers.index');
                    });
                });
                //Workers
                Route::get('worker',function(){
                    return view('managers.areaManager.worker');
                });
            });