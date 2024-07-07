<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ContacController;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
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

/**Home */

Route::get('/',[HomeController::class,'home'])->name('home.index');
//habilitar index
Route::get('home/index',[HomeController::class,'index'])->name('home.post');

Route::get('home/{post}',[HomeController::class,'show'])->name('home.show');

Route::get('category/{category:slug}',[HomeController::class,'category'])->name('home.category');
/**Home */

/** CRUDS */

Route::post('/contact',[ContacController::class,'send'])->name('contac.send');

/**categorias */
Route::resource('categories',CategoryController::class)->names('admin.categories');
/**categorias */

/**testimoniales */
Route::resource('testimonials',TestimonialController::class)->names('admin.testimonials');
/**testimoniales */

// certificates
Route::resource('services', CertificateController::class)->names('admin.services');
// certificates

//portafolio
Route::resource('posts', PostController::class)->names('admin.posts');
//portafolio

// Informacion Usuario
Route::resource('user',InformationController::class)->names('admin.user');
// Informacion Usuario

// Eliminar Imagen
Route::get('/image/delete/{id}', [ImageController::class, ('deleteImage')])->name('image.delete');
Route::get('/image/delete-service/{id}', [ImageController::class, ('dltImgService')])->name('image.delete.service');
Route::get('/image/delete-testimonio/{id}', [ImageController::class, ('dltImgTestimonio')])->name('image.delete.testimonio');
// Eliminar Imagen

Route::get('/user-edit',[PerfilController::class,('index')])->name('admin.user');
Route::post('/user-edit',[PerfilController::class,('store')])->name('user.edit');

/** CRUDS */

/** RESET PASSWORD */
Route::get("/forget-password",[ForgetPasswordManager::class,('forgetPassword')])->name('forget.password');
Route::post("/forget-password",[ForgetPasswordManager::class,('forgetPasswordPost')])->name('forget.password.post');
Route::get("/reset-password/{token}",[ForgetPasswordManager::class,('resetPassword')])->name('reset.password');
Route::post("/reset-password",[ForgetPasswordManager::class,('resetPasswordPost')])->name('reset.password.post');
/** RESET PASSWORD */