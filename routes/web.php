<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\MvimController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TotalController;
use App\Http\Controllers\BottomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MenuController;

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

//module的寫法
Route::view('/', 'home');
Route::redirect('/admin', '/admin/title');
Route::prefix('admin')->group(function () {
    //get
    Route::get('/title', [TitleController::class, 'index']);
    Route::get('/mvim', [MvimController::class, 'index']);
    Route::get('/ad', [AdController::class, 'index']);
    Route::get('/image', [ImageController::class, 'index']);
    Route::get('/total', [TotalController::class, 'index']);
    Route::get('/bottom', [BottomController::class, 'index']);
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/menu', [MenuController::class, 'index']);

    //post
    Route::post('/title', [TitleController::class, 'store']);
    Route::post('/mvim', [MvimController::class, 'store']);
    Route::post('/ad', [AdController::class, 'store']);
    Route::post('/image', [ImageController::class, 'store']);
    Route::post('/admin', [AdminController::class, 'store']);
    Route::post('/news', [NewsController::class, 'store']);
    Route::post('/menu', [MenuController::class, 'store']);

    //update
    Route::patch("/title/{id}", [TitleController::class, 'update']);
    Route::patch("/ad/{id}", [AdController::class, 'update']);
    
    //delete
    Route::delete("/title/{id}", [TitleController::class, 'destroy']);
    Route::delete("/ad/{id}", [AdController::class, 'destroy']);

    //show
    Route::patch("/title/sh/{id}",[TitleController::class, 'display']);
    Route::patch("/ad/sh/{id}",[AdController::class, 'display']);
});

// Route::get('admin', function ($module) {
//     switch ($module) {
//         case "title":
//             return view('backend.module', ['header' => '網站標題管理','module'=>'Title']);
//             break;
//         case "ad":
//             return view('backend.module', ['header' => '動態廣告文字管理','module'=>'Ad']);
//             break;
//         case "image":
//             return view('backend.module', ['header' => '校園映像圖片管理','module'=>'Image']);
//             break;
//         case "mvim":
//             return view('backend.module', ['header' => '動畫圖片管理','module'=>'Mvim']);
//             break;
//         case "total":
//             return view('backend.module', ['header' => '進站人數管理','module'=>'Total']);
//             break;
//         case "bottom":
//             return view('backend.module', ['header' => '頁尾版權管理','module'=>'Bottom']);
//             break;
//         case "news":
//             return view('backend.module', ['header' => '最新消息管理','module'=>'News']);
//             break;
//         case "admin":
//             return view('backend.module', ['header' => '管理者管理','module'=>'Admin']);
//             break;
//         case "menu":
//             return view('backend.module', ['header' => '選單管理','module'=>'Menu']);
//             break;
//     }
// });


//modals

Route::get("/modals/addTitle", [TitleController::class, 'create']);
Route::get("/modals/addAd", [AdController::class, 'create']);

//edit
Route::get("/modals/title/{id}", [TitleController::class, 'edit']);
Route::get("/modals/ad/{id}", [AdController::class, 'edit']);
                                        
                                        
                                        // 使用 group 的寫法
                                        // Route::prefix('admin')->group(function(){
                                            //     Route::view('/','backend.title');
                                            //     Route::view('/title','backend.title');
                                            //     Route::view('/ad','backend.ad');
                                            // });
                                            
                                            
                                            // 舊寫法
                                            // Route::view('/', function () {  
                                                //     return view('welcome');
                                                // });
