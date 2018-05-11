<?php

Route::group(['middleware' => 'web'], function() {
    Route::get('register', ['uses' => 'AuthApi@showRegistrationForm', 'as' => 'register']);
    Route::post('register', ['uses' => 'AuthApi@register', 'as' => 'register.post']);

    Route::get('login',   ['uses' => 'AuthApi@showLoginForm', 'as' => 'login']);
    Route::post('login',  ['uses' => 'AuthApi@login',         'as' => 'login.post']);
    Route::post('logout', ['uses' => 'AuthApi@logout',        'as' => 'logout']);

    Route::get('password/reset',         ['uses' => 'AuthApi@showLinkRequestForm', 'as' => 'password.request']);
    Route::post('password/email',        ['uses' => 'AuthApi@sendResetLinkEmail',  'as' => 'password.email']);
    Route::get('password/reset/{token}', ['uses' => 'AuthApi@showResetForm',       'as' => 'password.reset']);
    Route::post('password/reset',        ['uses' => 'AuthApi@reset']);

    Route::get('profile',          ['uses' => 'AuthApi@profile',        'as' => 'user.profile']);
    Route::put('profile/password', ['uses' => 'AuthApi@updatePassword', 'as' => 'user.update.password']);
    Route::put('profile/personal', ['uses' => 'AuthApi@updatePersonal', 'as' => 'user.update.personal']);
});