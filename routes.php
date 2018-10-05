<?php

// User WEB Routes
Route::namespace('Oxygencms\Users\Controllers')
    ->prefix('user/{user}')
    ->as('user.')
    ->middleware(['auth', 'personal'])
    ->group(function () {

        // Dashboard
        Route::get('dashboard', 'UserController@dashboard')->name('dashboard');

        // Profile
        Route::get('profile', 'UserController@profile')->name('profile');

        // Update user's personal information
        Route::patch('profile', 'UserController@profileUpdate')->name('profile.update');

        // Update user's password
        Route::patch('password', 'UserController@passwordUpdate')->name('password.update');
});
