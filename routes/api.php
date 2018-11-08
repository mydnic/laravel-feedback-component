<?php

use Illuminate\Support\Facades\Route;

Route::post('feedback', 'FeedbackController@store')->name('feedback.store');
