<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\pages\PageController;
use App\Http\Controllers\User\pages\ProfileController;
use App\Http\Controllers\User\posts\PostController;
use Illuminate\Support\Facades\Route;

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

//Routes Auth 
Route::get('/login', [LoginController::class , 'login_page'])->name('login');
Route::post('/login', [LoginController::class , 'store'])->name('login.store');
Route::get('/register' , [RegisterController::class , 'register_page'])->name('register');
Route::post('/register', [RegisterController::class ,'store'])->name('register.store');
Route::get('/logout', [LogoutController::class , 'logout'])->name('logout')->middleware('auth');

//Admin Routes
Route::middleware('is_admin')->group(function(){
  Route::get('/dashboard', [AdminController::class, 'admin_page'])->name('dashboard');
  //Routes Posts
  Route::controller(DashboardController::class)->group(function(){
    Route::get('/posts' , 'index')->name('posts.home');
    Route::get('/accept_posts/{id}', 'accept_posts')->name('accept_posts');
    Route::get('/reject_posts/{id}', 'reject_posts')->name('reject_posts');
    Route::delete('/posts/{id}', 'destroy')->name('posts.destroy');
  });
  Route::name('messages')->group(function(){
    Route::get('/messages', [AdminController::class, 'messages']);
    Route::delete('/messages/{id}', [AdminController::class, 'delete_message'])->name('.destroy');  
  });
  Route::name('users')->group(function(){
    Route::get('/users', [AdminController::class, 'users_Page'])->name('.home');
    Route::delete('/users/{id}', [AdminController::class, 'delete_user'])->name('.destroy');
  });
});
Route::middleware('auth')->group(function(){
  //routs profile page
  Route::controller(ProfileController::class)->group(function(){
    Route::get('/profile', 'index')->name('profile');
    Route::put('/password/{id}' , 'change_password')->name('change_password');
  });
  Route::controller(PostController::class)->group(function(){
    Route::get('/create-page' , 'create_post')->name('create_post');
    Route::post('/post' , 'store_post')->name('user_post.store');
    Route::get('/edit/{id}' , 'edit')->name('user.edit');
    Route::put('/post/{id}' , 'update')->name('user.update');
    Route::delete('/delete/{id}',  'destroy')->name('user.destroy');
  });

});
//users routes for pages
Route::controller(PageController::class)->group(function(){
  Route::get('/' , 'home')->name('home');
  Route::get('/about' , 'about')->name('about');
  Route::get('/contact' , 'contact')->name('contact');
  Route::post('/messages', 'messages')->name('messages.store');
  Route::get('/services' , 'services')->name('services');
  Route::get('/blog' , 'blog')->name('blog');

  //posts route
  Route::get('/single-post/{id}', 'single_post')->name('single-post');
  Route::post('/comments/{id}', 'store')->name('comments.store');
});

Route::controller(GoogleAuthController::class)->group(function(){
  Route::get('/auth/redirect' ,'redirect')->name('auth.redirect');
  Route::get('/auth/callback' , 'callback');
});
