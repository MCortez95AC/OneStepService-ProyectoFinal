<?php
Route::view('/', 'managers.generalManager.dashboard')->middleware('auth');
Auth::routes();
//Login and Register routes
Route::get('/login/worker', 'Auth\LoginController@showWorkerLoginForm');
Route::get('/login/client', 'Auth\LoginController@showClientLoginForm');

Route::post('/login/worker', 'Auth\LoginController@workerLogin');
Route::post('/login/client', 'Auth\LoginController@clientLogin');


    //admins
Route::group(['middleware' => ['auth:worker,web']],function(){
    Route::group(['prefix'=>'admin'],function(){
            //Super
        Route::get('super',function(){
            return view('managers.generalManager.dashboard');
        });
            /* Resutaurant Area */
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

            /* Room Service */
        Route::group(['prefix'=>'room-service'],function(){
            Route::get('products', 'ProductRoomServiceController@index')->name('products.rs.index');
            Route::get('products/disabled','ProductRoomServiceController@disabledProducts')->name('disabled.rs.products');
            Route::get('products/create', 'ProductRoomServiceController@create')->name('products.rs.create');
            Route::post('products/create','ProductRoomServiceController@store')->name('products.rs.store');
            Route::get('products/{id}/edit', 'ProductRoomServiceController@edit')->name('product.rs.edit');
            Route::put('products/{id}','ProductRoomServiceController@update')->name('product.rs.update');
            Route::delete('products/{id}','ProductRoomServiceController@destroy')->name('product.rs.destroy');
            Route::put('products/{id}/disabled','ProductRoomServiceController@disable')->name('product.rs.disable');


                /* Restaurant Workers */
            Route::get('workers','WorkerRoomServiceController@index')->name('workers.rs.index');
            Route::get('worker/create','WorkerRoomServiceController@create')->name('worker.rs.create');
            Route::post('product/cretate','WorkerRoomServiceController@store')->name('worker.rs.store');
        });

        //Workers Model
        Route::get('worker',function(){
            return view('managers.generalManager.areaManager.restaurant.dashboard');
        });


        //Clients Model
        Route::get('clients', function(){
            return view('managers.generalManager.clients.index');
        });
        Route::get('/client/create', 'ClientController@create')->name('client.create');
        Route::post('/client/create', 'clientController@store')->name('client.store');
    });
});
    //Clients View
