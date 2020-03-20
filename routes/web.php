<?php
Route::view('/', 'managers.generalManager.dashboard')->middleware('auth');
Auth::routes();
//Login and Register routes
Route::get('/login/worker', 'Auth\LoginController@showWorkerLoginForm');
Route::get('/login/client', 'Auth\LoginController@showClientLoginForm');
/* Route::get('/register/worker', 'Auth\RegisterController@showWorkerRegisterForm'); */
Route::get('/register/client', 'Auth\RegisterController@showClientRegisterForm');
/* 
Route::post('/login/worker', 'Auth\LoginController@workerLogin'); */
Route::post('/login/client', 'Auth\LoginController@clientLogin');
/* Route::post('/register/worker', 'Auth\RegisterController@createWorker'); */
Route::post('/register/client', 'Auth\RegisterController@createClient');


//Homes persons


    //admins
Route::group(['middleware' => ['auth:worker,web']],function(){
    Route::group(['prefix'=>'admin'],function(){
            //Super
        Route::get('super',function(){
            return view('managers.generalManager.dashboard');
        })/* ->middleware('auth') */;

        Route::get('clients', function(){
            return view('managers.generalManager.clients.index');
        });

        Route::group(['prefix'=>'restaurant'],function(){
            Route::get('products', 'ProductController@index')->name('products.index');
            Route::get('products/disabled','ProductController@disabledProducts')->name('disabled.products');

            Route::get('products/create', 'ProductController@create')->name('products.create');
            Route::post('products/create','ProductController@store')->name('products.store');

            Route::get('products/{id}/edit', 'ProductController@edit')->name('product.edit');
            Route::put('products/{id}','ProductController@update')->name('product.update');

            Route::delete('products/{id}','ProductController@destroy')->name('product.destroy');

            Route::put('products/{id}/disabled','ProductController@disable')->name('product.disable');


            /* Restaurant Workers */
            Route::get('worker/create','WorkerController@create')->name('worker.create');
            Route::post('product/cretate','WorkerController@store')->name('worker.store');

            Route::get('workers','WorkerController@index')->name('workers.index');
            //fin
        });
        //Workers
        Route::get('worker',function(){
            return view('managers.generalManager.areaManager.restaurant.dashboard');
        });
    });
});
    //Clients
