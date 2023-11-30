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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function(){
Route::get('welcome',[TweetController::class, 'index'])->name('welcomepage');
Route::post('/logout',[LoginController::class,'logout'])->name("logout");

});
