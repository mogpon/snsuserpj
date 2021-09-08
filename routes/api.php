<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SnsuserController;

Route::apiResource('/snsuser', SnsuserController::class);
