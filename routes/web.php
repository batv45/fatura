<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\MainController::class,'index'])
    ->middleware('auth')
    ->name('index');

Route::group(['middleware' => 'auth'],function (){
    Route::get('account/profile',[App\Http\Controllers\Account\ProfileController::class,'index'])
        ->name('account.profile');

    Route::put('account/settings/update',[App\Http\Controllers\Account\AccountSettingController::class,'update'])
        ->name('account.settings.update');


    Route::get('invoice/{ettn}/pdf',[App\Http\Controllers\eArsiv\eArsivController::class,'getPDF'])
        ->name('invoice.pdf');
    Route::get('invoice/{ettn}/html',[App\Http\Controllers\eArsiv\eArsivController::class,'getHTML'])
        ->name('invoice.html');

    Route::resource('invoice-sale',App\Http\Controllers\eArsiv\Sale\eArsivPurchaseController::class);
    Route::resource('invoice-purchase',App\Http\Controllers\eArsiv\Purchase\eArsivPurchaseController::class);

});
