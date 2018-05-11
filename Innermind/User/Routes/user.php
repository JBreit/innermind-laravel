<?php

Route::group(['prefix' => 'users', 'middleware' => ['web']], function () {

    Route::get('/',          ['uses' => 'UserApi@index', 'as' => 'user']);
    Route::get('/{id}',      ['uses' => 'UserApi@show',  'as' => 'user.show']);
    Route::get('/{id}/edit', ['uses' => 'UserApi@edit',  'as' => 'user.edit']);
});
