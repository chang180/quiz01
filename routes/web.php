<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','home');
Route::view('/admin','backend.title');
Route::get('/admin/(module)',function($module){
    switch($module){
        case "title":
return view('backend.title');
break;
case "ad":
    return view('backend.ad');
        break;
    }
});
// Route::prefix('admin')->group(function(){
//     Route::view('/','backend.title');
//     Route::view('/title','backend.title');
//     Route::view('/ad','backend.ad');
// });


// 舊寫法
// Route::view('/', function () {  
//     return view('welcome');
// });
