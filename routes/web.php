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
 Route::post('/profile/createteam',[\App\Http\Controllers\ProfileController::class, 'createTeam'])->name('createteam');
 Route::post('/main',[\App\Http\Controllers\MainController::class, 'index'])->name('main');
 Route::get('/team/{id}',[\App\Http\Controllers\TeamController::class, 'index'])->name('team');
 Route::get('/addmembers/{id}',[\App\Http\Controllers\TeamController::class, 'addMembers'])->name('addmember'); 
 Route::get('/tournament',[\App\Http\Controllers\TournamentController::class, 'index'])->name('tournament');
 Route::any('tournament/create_order',[\App\Http\Controllers\TournamentController::class, 'createTournament'])->name('create_order');
 Route::post('tournament/create_order/save',[\App\Http\Controllers\TournamentController::class, 'saveTournament'])->name('save_order');
 Route::get('/match/{id}',[\App\Http\Controllers\TournamentController::class, 'matchView'])->name('match');
 Route::get('/match/join/{id}',[\App\Http\Controllers\TournamentController::class, 'joinTournament'])->name('join');


 Route::middleware(['role:admin|moderator'])->prefix('admin_panel')->group(function () {
   Route::get('/',[\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin');
 //  Route::get('/users',[\App\Http\Controllers\Admin\HomeController::class, 'usersView']);
   Route::get('/users',[\App\Http\Controllers\Admin\HomeController::class, 'usersView'])->name('users'); 
   Route::get('/teams',[\App\Http\Controllers\Admin\HomeController::class, 'teamsView'])->name('teams'); 
   
   Route::get('/users_card/{id}',[\App\Http\Controllers\Admin\HomeController::class, 'userCard',]);
   Route::get('/verified/{id}',[\App\Http\Controllers\Admin\HomeController::class, 'verified',])->name('verified');
   Route::get('/tournament',[\App\Http\Controllers\Admin\TournamentController::class, 'index',])->name('admin_tournament');
   Route::any('/tournament/create_tournament',[\App\Http\Controllers\Admin\TournamentController::class, 'createTournament',])->name('create_tournament');
   Route::get('/tournament/tournament_view/{id}',[\App\Http\Controllers\Admin\TournamentController::class, 'tournamentView',])->name('tournament_view');
   Route::post('/tournament/edit/{id}',[\App\Http\Controllers\Admin\TournamentController::class, 'tournamentEdit',])->name('edit_tournament');
   Route::any('/tournament/delete/{id}',[\App\Http\Controllers\Admin\TournamentController::class, 'tournamentDelete',])->name('delete_tournament');
   Route::any('/tournament/tournaments_teams/{id}',[\App\Http\Controllers\Admin\TournamentController::class, 'tournamentTeams',])->name('tournaments_teams');

   Route::any('/moderators',[\App\Http\Controllers\Admin\HomeController::class, 'moderators',])->name('moderators');
   Route::any('/moderators/create_moderators/{id}',[\App\Http\Controllers\Admin\HomeController::class, 'createModerators',])->name('create_moderators');
});
 //Route::get('/admin',[\App\Http\Controllers\AdminPanelController::class, 'index'])->name('admin');
//  Route::post('/admin/login',[\App\Http\Controllers\AdminPanelController::class, 'login']);

