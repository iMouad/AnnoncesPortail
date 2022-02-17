<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnnoncesController;
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

Route::view('/', 'welcome');

//Member dashboard routes
Route::get('dashboard',[AuthController::class, 'dashboard'])->middleware('isLoggedIn')->name('dashboard');
Route::get('dashboard/profile',[AuthController::class, 'profile'])->middleware('isLoggedIn')->name('profile');
Route::put('dashboard/profile/{profile}', [AuthController::class, 'update'])->middleware('isLoggedIn')->name('profile.update');

Route::get('dashboard/annonces', [AnnoncesController::class, 'showview'])->middleware('isLoggedIn')->name('annonces');
Route::get('dashboard/annonces/attente', [AnnoncesController::class, 'showannoncesattente'])->middleware('isLoggedIn')->name('annonces.attente');
Route::get('dashboard/annonces/ajouter', [AnnoncesController::class, 'ajouter'])->middleware('isLoggedIn')->name('ajouterannonce');
Route::post('dashboard/annonces/ajouter', [AnnoncesController::class, 'store'])->middleware('isLoggedIn')->name('annonce.ajouter');
Route::get('dashboard/annonces/{annonce}', [AnnoncesController::class, 'edit'])->middleware('isLoggedIn')->name('annonce.edit');
Route::put('dashboard/annonces/{annonce}', [AnnoncesController::class, 'update'])->middleware('isLoggedIn')->name('annonce.update');
Route::get('dashboard/annonces/delete/{annonce}', [AnnoncesController::class, 'delete'])->middleware('isLoggedIn')->name('annonce.delete');





// Authentification routes
Route::get('login', [AuthController::class, 'login'])->middleware('alreadyLoggedIn')->name('login');
Route::get('inscription', [AuthController::class, 'registration'])->middleware('alreadyLoggedIn')->name('registration');
Route::post('registeruser',[AuthController::class, 'registerUser'])->name('registeruser');
Route::post('login',[AuthController::class, 'userLogin'])->name('login-user');
Route::get('logout',[AuthController::class, 'logout'])->name('logout');