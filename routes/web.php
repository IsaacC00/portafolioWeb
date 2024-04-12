<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ContacController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestimonialController;

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

Route::get('/backend',[BackController::class,'index'])->name('backend');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::post('/logout',[LogoutController::class,'store'])->name('logout');

/**Post */
Route::get('/',[PostController::class,'home'])->name('posts.home');
//habilitar index
Route::get('posts/index',[PostController::class,'index'])->name('posts.index');

Route::get('posts/{post}',[PostController::class,'show'])->name('posts.show');

Route::get('category/{category}',[PostController::class,'category'])->name('posts.category');

/** CRUDS */

Route::post('/contact',[ContacController::class,'send'])->name('contac.send');

/**categorias */
Route::resource('categories',CategoryController::class)->names('admin.categories');
/**categorias */

/**testimoniales */
Route::resource('testimonials',TestimonialController::class)->names('admin.testimonials');
/**testimoniales */

// certificates
Route::resource('certificates', CertificateController::class)->names('admin.certificates');
// certificates

/** projects*/
Route::resource('portfolio',PortfolioController::class)->names('admin.portfolio');
/** projects*/

// Informacion Usuario
Route::resource('user',InformationController::class)->names('admin.user');
// Informacion Usuario

Route::get('/user-edit',[PerfilController::class,('index')])->name('admin.user');
Route::post('/user-edit',[PerfilController::class,('store')])->name('user.edit');

/** CRUDS */