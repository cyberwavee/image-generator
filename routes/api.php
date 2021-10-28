<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ImageGeneratorController;

Route::group([], function () {
    Route::get('/generate-image', [ImageGeneratorController::class, 'generateImage'])->name('generate-image');
});
