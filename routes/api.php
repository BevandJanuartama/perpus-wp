<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BukuApiController;

Route::apiResource('bukuapi', BukuApiController::class);