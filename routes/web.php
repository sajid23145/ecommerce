<?php

use App\Http\Controllers\paypalcontroller;
use App\Livewire\Addproduct;
use App\Livewire\Admin;
use App\Livewire\Login;
use App\Livewire\PayPalCheckout;
use App\Livewire\Productdetail;
use App\Livewire\Productlist;
use App\Livewire\Register;
use App\Livewire\Submitorder;
use Illuminate\Support\Facades\Route;
use League\MimeTypeDetection\FinfoMimeTypeDetector;



Route::get('/register',Register::class);
Route::get('/login',Login::class)->name('login');
Route::get('/',Productlist::class)->name('product.list');

Route::middleware(['auth','user'])->group(function(){

// Route::middleware('Auth')->group(function(){
    Route::get('/productdetail/{id}',Productdetail::class);

// });
Route::get('/submitorder/{id}',Submitorder::class);
Route::get('/paypalcheckout/{id}',PayPalCheckout::class);

Route::get('/paypal/success/{id}',[paypalcontroller::class,'success'])->name('paypal.success');

});


route::middleware(['auth','admin'])->group(function(){

    Route::get('/admin', function () {
        return view('dashboard'); // this view should include @livewire('admin')
    });

    Route::get('/showproduct', function () {
        return view('productshow'); // this view should include @livewire('admin')
    })->name('show.product');

    Route::get('/addproduct',function () {
        return view('addproduct');});

        Route::get('/editproduct/{id}',function ($id) {
            return view('editproduct',['id'=>$id]);
        });

        Route::get('/ordershow',function () {
            return view('showorder');
        })->name('order.show');
    });




