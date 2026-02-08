<?php
use illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostApiController;

Route::get( '/posts', [ PostApiController::class, 'index' ] );
Route::get( '/posts/{post}', [ PostApiController::class, 'show' ] );
