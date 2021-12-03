<?php

use App\Http\Controllers\IntroduceController;
use App\Models\ApplyList;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/posts', IntroduceController::class)->middleware(["auth"]);

Route::delete('/posts/images/{id}', [IntroduceController::class, "deleteImage"])->middleware(["auth"]);

require __DIR__ . '/auth.php';
