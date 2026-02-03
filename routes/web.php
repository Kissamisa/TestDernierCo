<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerImage;

Route::get('/', [ControllerImage::class, 'fetchImages']);
Route::get('/image/{id}', [ControllerImage::class, 'showImage']);
