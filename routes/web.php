<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\IndexController;

Route::get('/', [IndexController::class, 'index'])->name('index');
