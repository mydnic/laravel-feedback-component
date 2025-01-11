<?php

use Illuminate\Support\Facades\Route;

Route::post('/feedback', [config('kustomer.controller'), 'store'])
    ->name('feedback.store');
