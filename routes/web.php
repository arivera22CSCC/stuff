<?php
use App\Http\Controllers\ProfileControler;
use App\Http\Controllers\TweetController;  
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;      
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;
use App\Models\User;
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
Route::get('/', function () {

    $tweets= Tweet::all(); 

    return view('welcome', ['tweets' => $tweets]);
});

Route::resource('tweets',TweetController::class); 
Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function(){
Route::get('/welcome',[TweetController::class, 'index'])->name('welcome-page');
Route::post('/logout',[LoginController::class,'logout'])->name("logout");
Route::get('/tweets',[TweetController::class, 'index'])->name('tweets.index');
Route::post('/tweets',[TweetController::class, 'store'])->name('tweets.index');
Route::delete('/tweets/{id}', [TweetController::class, 'destroy'])->name('tweets.destroy');
Route::get('/tweets/{tweet}/edit', 'TweetController@edit')->name('tweets.edit');
});
