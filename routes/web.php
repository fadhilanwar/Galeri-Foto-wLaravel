<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FotoController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/welcome', function () {
    return view('welcome');
});

// Route::group(['middleware' => 'guest'], function() {
//     Route::get('/register', [PageController::class, 'toSignUp'])->name('register');
//     Route::post('/register', [PageController::class, 'toCreate'])->name('registerPost');
//     Route::get('/login', [PageController::class, 'loginForm'])->name('login');
//     Route::post('/login', [PageController::class, 'loginRequest'])->name('loginrequest');
//     Route::get('/signlink', [PageController::class, 'signLink'])->name('signlink');

// });

// Route::group(['middleware' => 'auth'], function() {
//     Route::get('/dashboard',[PageController::class, 'toDashboard']);
//     Route::get('/logout', [PageController::class, 'out'])->name('logout');


// });

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::get('/signlink', [LoginController::class, 'signlink'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/try', [LoginController::class, 'tryCheck'])->middleware('guest');
Route::get('/fp', [LoginController::class, 'forgotPassword'])->middleware('guest');
Route::get('/checked', [LoginController::class, 'toChangePassword'])->middleware('guest');
Route::post('/cpfc', [LoginController::class, 'cpfc'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', [LoginController::class, 'registerForm']);
Route::post('/register', [LoginController::class, 'store']);
Route::get('/yoursProfile', [PageController::class, 'toYoursProfile'])->middleware('auth');
Route::get('/yoursProfileAlbum', [PageController::class, 'toYoursProfileAlbum'])->middleware('auth');
Route::get('/yoursProfilePopular', [PageController::class, 'toYoursProfilePopular'])->middleware('auth');
Route::get('/yoursAccount', [PageController::class, 'toYoursAccount'])->middleware('auth');
Route::post('/yoursAccount/updatePassword', [LoginController::class, 'updatePassword'])->middleware('auth');


Route::get('/dashboard',[PageController::class, 'index'])->middleware('auth');
Route::get('/dashboard/album',[FotoController::class, 'toNewAlbum'])->middleware('auth');

// Route::get('/dashboard', [FotoController::class, 'index']);
Route::get('/yourAlbum', [PageController::class, 'myAlbum'])->middleware('auth');
Route::get('/myAlbum', [FotoController::class, 'myAlbum'])->middleware('auth');
Route::get('/posts', [FotoController::class, 'toPost'])->middleware('auth');
Route::get('/mostLikedAlbum', [FotoController::class, 'mlAlbum'])->middleware('auth');
Route::get('/exploreImages', [FotoController::class, 'imageAll'])->middleware('auth');
Route::get('/exploreAlbums', [FotoController::class, 'albumsAll'])->middleware('auth');
Route::get('/exploreUsers', [FotoController::class, 'usersAll'])->middleware('auth');
Route::get('/exploreUsers/{id}', [FotoController::class, 'usersVisit'])->middleware('auth');
Route::get('/isi', [FotoController::class, 'isi'])->middleware('auth');
Route::post('/changeProfilePhoto', [LoginController::class, 'changePP'])->middleware('auth');
// Route::get('/fyp/showAlbum/{id}', [FotoController::class, 'showAlbum']);
Route::get('/yourAlbum/{id}', [FotoController::class, 'showAlbum'])->middleware('auth');
Route::post('/yourAlbum/{id}/delete', [FotoController::class, 'deleteAlbum'])->middleware('auth');
Route::post('/yourAlbum/{id}/update', [FotoController::class, 'updateAlbum'])->middleware('auth');
Route::post('/yourAlbum/editAlbum', [FotoController::class, 'editAlbum'])->middleware('auth');
Route::post('/yourAlbum/{id}/editImageInfo', [FotoController::class, 'editImageInfo'])->middleware('auth');
Route::post('/yourAlbum/deletePhoto/{id}', [FotoController::class, 'deletePhoto'])->middleware('auth');
Route::post('/dashboard/album/create', [FotoController::class, 'createAlbum'])->middleware('auth');
Route::post('/dashboard/album/upload', [FotoController::class, 'uploadFoto'])->middleware('auth');
Route::post('/yoursAccount/update', [LoginController::class, 'updateAccount'])->middleware('auth');
Route::post('/like', [FotoController::class, 'like'])->middleware('auth');
Route::post('/komen', [FotoController::class, 'komen'])->middleware('auth');
Route::post('/deleteKomen/{id}', [FotoController::class, 'deleteKomen'])->middleware('auth');

Route::get('/seepost/{id}', [PageController::class, 'seepost'])->middleware('auth');
