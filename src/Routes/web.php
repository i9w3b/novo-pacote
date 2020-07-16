<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */

Route::name(config('novopacote.route_name'))->group(function () {
    Route::prefix(config('novopacote.prefix'))->group(function () {
        Route::middleware(config('novopacote.middleware'))->group(function () {

            Route::get('novopacote', 'NovoPacoteController@index')->name('index');
            Route::get('novopacote/alert', 'NovoPacoteController@alert')->name('alert');

        });
    });
});
