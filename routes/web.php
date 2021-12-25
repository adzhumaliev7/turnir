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
 Route::post('/profile/delte/{id}',[\App\Http\Controllers\ProfileController::class, 'deleteProfile'])->name('delete_profile');
 Route::post('/profile/createteam',[\App\Http\Controllers\ProfileController::class, 'createTeam'])->name('createteam');
 Route::post('/profile/tournaments/{id}',[\App\Http\Controllers\ProfileController::class, 'getTournaments'])->name('get_tournaments');
 Route::post('/main',[\App\Http\Controllers\MainController::class, 'index'])->name('main');
 Route::get('/team/{id}/',[\App\Http\Controllers\TeamController::class, 'index'])->name('team');
 Route::get('/addmembers/{id}',[\App\Http\Controllers\TeamController::class, 'addMembers'])->name('addmember'); 
 Route::get('/team/exit/{id}',[\App\Http\Controllers\TeamController::class, 'exitTeam'])->name('exit_team'); 
 Route::get('/team/delete/{id}',[\App\Http\Controllers\TeamController::class, 'deleteMember'])->name('delete_member'); 
 Route::get('/team/add_admin/{id}{team_id}',[\App\Http\Controllers\TeamController::class, 'addAdmin'])->name('add_admin'); 
 Route::get('/tournament',[\App\Http\Controllers\TournamentController::class, 'index'])->name('tournament');
 Route::any('tournament/create_order',[\App\Http\Controllers\TournamentController::class, 'createTournament'])->name('create_order');
 Route::post('tournament/create_order/save',[\App\Http\Controllers\TournamentController::class, 'saveTournament'])->name('save_order');
 Route::get('/match/{id}',[\App\Http\Controllers\TournamentController::class, 'matchView'])->name('match');
 Route::get('/match/join/{id}',[\App\Http\Controllers\TournamentController::class, 'joinTournament'])->name('join');


 Route::middleware(['role:admin|moderator'])->prefix('admin_panel')->group(function () {
   Route::get('/',[\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin');
 //  Route::get('/users',[\App\Http\Controllers\Admin\HomeController::class, 'usersView']);
   Route::get('/users',[\App\Http\Controllers\Admin\HomeController::class, 'usersView'])->name('users'); 
   Route::get('/users/add_ban/{id}',[\App\Http\Controllers\Admin\HomeController::class, 'addBan'])->name('add_ban'); 
   Route::get('/users/unblock/{id}',[\App\Http\Controllers\Admin\HomeController::class, 'unblock'])->name('unblock'); 
   Route::get('/teams',[\App\Http\Controllers\Admin\HomeController::class, 'teamsView'])->name('teams'); 
   
   Route::get('/users_card/{id}',[\App\Http\Controllers\Admin\HomeController::class, 'userCard',]);
   Route::get('/verified/{id}',[\App\Http\Controllers\Admin\HomeController::class, 'verified',])->name('verified');
   Route::get('/tournament',[\App\Http\Controllers\Admin\TournamentController::class, 'index',])->name('admin_tournament');
   Route::any('/tournament/create_tournament',[\App\Http\Controllers\Admin\TournamentController::class, 'createTournament',])->name('create_tournament');
   Route::get('/tournament/tournament_view/{id}',[\App\Http\Controllers\Admin\TournamentController::class, 'tournamentView',])->name('tournament_view');
   Route::post('/tournament/edit/{id}',[\App\Http\Controllers\Admin\TournamentController::class, 'tournamentEdit',])->name('edit_tournament');
   Route::any('/tournament/delete/{id}',[\App\Http\Controllers\Admin\TournamentController::class, 'tournamentDelete',])->name('delete_tournament');
   Route::any('/tournament/tournaments_teams/{id}',[\App\Http\Controllers\Admin\TournamentController::class, 'tournamentTeams',])->name('tournaments_teams');
   Route::any('/tournament/tournaments_teams/apply_team/{id}',[\App\Http\Controllers\Admin\TournamentController::class, 'applyTeam',])->name('apply_team');
   Route::any('/tournament/tournaments_teams/refuse_team/{id}',[\App\Http\Controllers\Admin\TournamentController::class, 'refuseTeam',])->name('refuse_team');

   Route::any('/moderators',[\App\Http\Controllers\Admin\HomeController::class, 'moderators',])->name('moderators');
   Route::any('/moderators/create_moderators/',[\App\Http\Controllers\Admin\HomeController::class, 'createModerators',])->name('create_moderators');
   Route::get('/moderators/create_moderator/save_moderator', [App\Http\Controllers\Admin\HomeController::class, 'saveModerator'])->name('save_moderator');
   Route::get('/moderators/delete_moderators/{id}', [App\Http\Controllers\Admin\HomeController::class, 'delteModeratos'])->name('delete_moderators');

   Route::get('/help',[\App\Http\Controllers\Admin\HomeController::class, 'help',])->name('help');
   Route::get('/help/create_help',[\App\Http\Controllers\Admin\HomeController::class, 'createHelp',])->name('create_help');
   Route::any('/help/create_help/save_help',[\App\Http\Controllers\Admin\HomeController::class, 'saveHelp',])->name('save_help');
   Route::any('/help/edit_help/{id}',[\App\Http\Controllers\Admin\HomeController::class, 'editHelp',])->name('edit_help');
   Route::post('/help/edit_help_save/{id}',[\App\Http\Controllers\Admin\HomeController::class, 'editHelpSave',])->name('edit_help_save');
});
 //Route::get('/admin',[\App\Http\Controllers\AdminPanelController::class, 'index'])->name('admin');
//  Route::post('/admin/login',[\App\Http\Controllers\AdminPanelController::class, 'login']);

