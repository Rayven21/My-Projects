<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IPController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GamingController;
use App\Http\Controllers\OthersController;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\TermsAndConditionsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostUpvoteController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\EducationalController;
use App\Http\Controllers\PostApprovalController;
use App\Http\Controllers\PostDownvoteController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EntertainmentController;

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

Route::get('/', function() {
   return view('home');
})->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');
Route::get('/terms-and-conditions', [TermsAndConditionsController::class, 'index'])->name('terms&conditions');

Route::get('/contactus', [ContactController::class, 'index'])->name('contactus');
Route::post('/contactus', [ContactController::class, 'sendEmail'])->name('send.email');

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

Route::get('/users/{user:name}/posts',[UserPostController::class, 'index'])->name('users.posts');
Route::post('/users/{user:name}/posts', [UserPostController::class, 'update_avatar']);

Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);

//Geolocation before registration
Route::get('/geolocator',[IPController::class, 'geolocator'])->name('geolocator');
Route::post('/get-ip-details',[IPController::class, 'get_ip_details'])->name('get-ip-details');

Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/posts',[PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');
Route::post('/posts',[PostController::class, 'store']);


/* Route::get('/posts',[PostAdminController::class, 'index'])->name('posts');
Route::get('/posts/{post}',[PostAdminController::class, 'show'])->name('posts.show');
Route::post('/posts',[PostAdminController::class, 'store']); */

Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{post:id}/edit',[PostController::class, 'edit'])->name('posts.edit');
Route::patch('/posts/{post:id}/update',[PostController::class, 'update'])->name('posts.update');

Route::get('/approval',[PostApprovalController::class, 'index'])->name('approval');
Route::get('/approval/{post}',[PostApprovalController::class, 'destroy'])->name('approval.destroy');
Route::get('/approval/{post:id}/approve',[PostApprovalController::class, 'update'])->name('approval.approve');




//Post Categories
Route::get('/categories',[CategoriesController::class, 'index'])->name('categories');
Route::get('/news',[NewsController::class, 'index'])->name('news');
Route::get('/entertainment',[EntertainmentController::class, 'index'])->name('entertainment');
Route::get('/sports',[SportsController::class, 'index'])->name('sports');
Route::get('/educational',[EducationalController::class, 'index'])->name('educational');
Route::get('/gaming',[GamingController::class, 'index'])->name('gaming');
Route::get('/advertisement',[AdvertisementController::class, 'index'])->name('advertisement');
Route::get('/general',[GeneralController::class, 'index'])->name('general');
Route::get('/others',[OthersController::class, 'index'])->name('others');



Route::post('/posts/{post}/upvotes',[PostUpvoteController::class, 'store'])->name('posts.upvotes');
Route::delete('/posts/{post}/returnupvote',[PostUpvoteController::class, 'destroy'])->name('posts.returnupvote');

Route::post('/posts/{post}/downvotes',[PostDownvoteController::class, 'store'])->name('posts.downvotes');
Route::delete('/posts/{post}/returndownvote',[PostDownvoteController::class, 'destroy'])->name('posts.returndownvote');




