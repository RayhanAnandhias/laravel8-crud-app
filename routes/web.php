<?php

use App\Http\Controllers\Komik;
use App\Http\Controllers\Pages;
use App\Http\Controllers\Orang;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Pages::class, 'index']);
Route::get('/pages/about', [Pages::class, 'about']);
Route::get('/pages/contact', [Pages::class, 'contact']);
Route::get('/orang', [Orang::class, 'index']);
Route::get('/komik', [Komik::class, 'index']);
Route::get('/komik/create', [Komik::class, 'create']);
Route::post('/komik/save', [Komik::class, 'save']);
Route::post('/komik/update/{id}', [Komik::class, 'update'])->where('id', '[0-9]+');
Route::get('/komik/edit/{slug}', [Komik::class, 'edit']);
Route::delete('/komik/{num}', [Komik::class, 'delete'])->where('num', '[0-9]+');
Route::get('/komik/{slug}', [Komik::class, 'detail']);
