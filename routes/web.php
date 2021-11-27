<?php

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

Route::get('/', function() {
    return view('login');
});


Route::name('user.')->group(function (){
    Route::view('/main', 'main')->middleware('auth')->name('main');
    Route::get('/login',function(){
        if(Auth::check()){
            return redirect(route('user.main'));
        }
        return view('login');
    })->name('login');

    Route::post('/login',[\App\Http\Controllers\LoginController::class, 'login']);

    Route::get('/logout', function(){
        Auth::logout();
        return redirect ('/');
    })->name('logout');

    Route::get('/registration' , function(){
        if(Auth::check()){
            return redirect(route('user.main'));
        }
         return view('registration'); 
    })->name('registration');
    
    Route::post('/registration',[\App\Http\Controllers\RegisterController::class, 'save']);
   
});
 Route::get('/profile',[\App\Http\Controllers\ProfileController::class, 'index'])->name('profile'); 
 Route::post('/profile',[\App\Http\Controllers\ProfileController::class, 'saveProfile']);
 Route::post('/main',[\App\Http\Controllers\MainController::class, 'index'])->name('main');
 Route::get('/tournament',[\App\Http\Controllers\TournamentController::class, 'index'])->name('tournament');


 Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
   Route::get('/',[\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin');
   Route::get('/users',[\App\Http\Controllers\Admin\HomeController::class, 'usersView']);
   Route::get('/users',[\App\Http\Controllers\Admin\HomeController::class, 'usersView'])->name('users');
   Route::get('/users_card/{id}',[\App\Http\Controllers\Admin\HomeController::class, 'userCard',]);
   Route::get('/verified/{id}',[\App\Http\Controllers\Admin\HomeController::class, 'verified',])->name('verified');
});
 //Route::get('/admin',[\App\Http\Controllers\AdminPanelController::class, 'index'])->name('admin');
//  Route::post('/admin/login',[\App\Http\Controllers\AdminPanelController::class, 'login']);

