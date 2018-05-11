<?php

// Route::get('/', function() {
//     return redirect('login');
// });

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/dashboard', ['uses' => 'AppApi@dashboard', 'as' => 'app.dashboard']);
});