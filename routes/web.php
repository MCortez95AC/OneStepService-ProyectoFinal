<?php
Route::get('/', 'Auth\LoginController@showClientLoginForm');
Auth::routes();
//Login and Register routes
Route::get('/login/worker', 'Auth\LoginController@showWorkerLoginForm')->name('worker.login');
Route::get('/login/client', 'Auth\LoginController@showClientLoginForm')->name('client.login');

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
                /* Restaurant Products */
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
            Route::get('worker/{id}/edit','WorkerController@edit')->name('worker.edit');
            Route::delete('worker/{id}','WorkerController@destroy')->name('worker.destroy');
            Route::put('worker/{id}','WorkerController@update')->name('worker.update');
            Route::delete('worker/{id}','WorkerController@destroy')->name('worker.destroy');
                
                /* Orders Panel */
            Route::get('panel', 'RestaurantPanelController@panel')->name('restaurant.panel');

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

            Route::get('workers','WorkerRoomServiceController@index')->name('workers.rs.index');
            Route::get('worker/create','WorkerRoomServiceController@create')->name('worker.rs.create');
            Route::get('worker/{id}/edit','WorkerRoomServiceController@edit')->name('worker.rs.edit');
            Route::post('product/cretate','WorkerRoomServiceController@store')->name('worker.rs.store');
            Route::delete('worker/{id}','WorkerRoomServiceController@destroy')->name('worker.rs.destroy');
            Route::put('worker/{id}','WorkerRoomServiceController@update')->name('worker.rs.update');
        });

        //Workers Model
        Route::get('worker',function(){
            return view('managers.generalManager.areaManager.restaurant.dashboard');
        });

        //Clients Model
        Route::get('clients','ClientCRUDController@index')->name('client.index');
        Route::get('/client/create', 'ClientCRUDController@create')->name('client.create');
        Route::post('/client/create', 'clientCRUDController@store')->name('client.store');
        Route::get('/client/{id}/edit', 'clientCRUDController@edit')->name('client.edit');
        Route::delete('/client/{id}', 'clientCRUDController@destroy')->name('client.destroy');
        Route::put('/client/{id}','clientCRUDController@update')->name('client.update');
    });
});



    //Clients View
    Route::group(['middleware' => ['auth:client']],function(){
        Route::group(['prefix'=>'client'],function(){
            Route::get('home', 'clientsView\ClientController@home')->name('client.home');
            Route::group(['prefix'=>'restaurant'],function(){
                Route::get('home','clientsView\RestaurantController@index')->name('restaurant.home');
                Route::get('products/{category}','clientsView\RestaurantController@index')->name('products.category');
                Route::get('myOrder','clientsView\RestaurantController@myOrder')->name('restaurant.myOrder');
                Route::Post('tempOrder/create','clientsView\RestaurantController@newTempOrder')->name('restaurant.tempOrder');
                /* Route::Post('tempOrder/chargeOnHotelAccount','clientsView\RestaurantController@chargeOnHotelAccount')->name('restaurant.chargeOnHotelAccount'); */
                Route::Post('tempOrder/chargeOnHotelAccount','RestaurantPanelController@chargeOnHotelAccount');;
                /* Route::delete('car') */
            });
            
        });
    });

    Route::get('test',function(){
        return view('managers.generalManager.testPusher');
    });

    Route::get('message', function () {
        $message['user'] = "Miguel Cortez";
        $message['message'] =  "Prueba mensaje desde Pusher";
        $success = event(new App\Events\NewMessage($message));
        return $success;
    });
/*     Route::get('sendToPanel', function () {
        $message['user'] = "Miguel Cortez";
        $message['message'] =  "Prueba mensaje desde Pusher";
        $success = event(new App\Events\SendOrderToRestaurant($message));
        return $success;
    }); */
