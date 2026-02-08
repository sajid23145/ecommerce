<?php

use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\dashboardcontroller;
use Illuminate\Support\Facades\Route;


route::get('register',[usercontroller::class,'index'])->name('register');
route::post('register',[usercontroller::class,'create'])->name('m.register');
route::get('/',function(){return view('login');})->name('m.login');
route::post('login',[usercontroller::class,'login'])->name('login');
Route::post('/logout', [Postcontroller::class, 'logout'])->name('logout');


route::middleware(['admin'])->group(function()
{
Route::get('/admin/dashboard', [dashboardcontroller::class, 'index'])->name('admin.dashboard');
Route::get('/categories', [categorycontroller::class, 'index'])->name('categories.index');
Route::resource('categories', categorycontroller::class);

});


route::middleware(['user'])->group(function()
{
Route::get('/user/dashboard', [dashboardcontroller::class, 'index'])->name('user.dashboard');
Route::get('post.index', [Postcontroller::class, 'index'])->name('post.index');
Route::resource('posts', PostController::class);

});
