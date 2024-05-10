<?php

use Bidhan\AiMlKit\Http\Controllers\CheckController;
use Illuminate\Support\Facades\Route;

Route::get('/user-ip', [CheckController::class, 'index']);
