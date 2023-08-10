<?php

use App\Http\Controllers\Routing;
use Illuminate\Support\Facades\Route;


Route::get('/', [Routing::class, 'showIndex'])->name('/');

Route::middleware(['disable_back'])->group(function () {
    Route::middleware(['session_timeout'])->group(function () {
    });
});
