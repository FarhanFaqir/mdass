<?php

use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return view('helo');
});

require __DIR__.'/auth.php';
