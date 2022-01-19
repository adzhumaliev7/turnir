<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});


Route::name('user.')->group(function () {
  
    
    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect(route('user.main'));
        }
        return view('auth.login');
    })->name('login');

    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);

    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('/registration', function () {
        if (Auth::check()) {
            return redirect(route('user.main'));
        }
        return view('auth.registration');
    })->name('registration');

    Route::post('/registration', [\App\Http\Controllers\Auth\RegisterController::class, 'save']);
});
Route::get('/registration/confirm/{token}', [\App\Http\Controllers\Auth\RegisterController::class, 'confirmEmail']);

Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::post('/profile', [\App\Http\Controllers\ProfileController::class, 'saveProfile']);
Route::post('/profile/delte/{id}', [\App\Http\Controllers\ProfileController::class, 'deleteProfile'])->name('delete_profile');
Route::post('/profile/createteam', [\App\Http\Controllers\ProfileController::class, 'createTeam'])->name('createteam');
Route::post('/profile/tournaments/{id}', [\App\Http\Controllers\ProfileController::class, 'getTournaments'])->name('get_tournaments');
Route::get('/main', [\App\Http\Controllers\MainController::class, 'index'])->name('main');
Route::get('/team/{id}/', [\App\Http\Controllers\TeamController::class, 'index'])->middleware('auth')->name('team');
Route::get('/addmembers/{id}', [\App\Http\Controllers\TeamController::class, 'addMembers'])->name('addmember');
Route::get('/team/exit/{id}', [\App\Http\Controllers\TeamController::class, 'exitTeam'])->name('exit_team');
Route::get('/team/delete/{id}', [\App\Http\Controllers\TeamController::class, 'deleteMember'])->name('delete_member');
Route::post('/team/delete_team/{id}', [\App\Http\Controllers\TeamController::class, 'deleteTeam'])->name('delete_team');
Route::get('/team/add_admin/{id}{team_id}', [\App\Http\Controllers\TeamController::class, 'addAdmin'])->name('add_admin');
Route::get('/tournament', [\App\Http\Controllers\TournamentController::class, 'index'])->middleware('auth')->name('tournament');
Route::any('tournament/create_order', [\App\Http\Controllers\TournamentController::class, 'createTournament'])->name('create_order');
Route::post('tournament/create_order/save', [\App\Http\Controllers\TournamentController::class, 'saveTournament'])->name('save_order');
Route::get('/match/{id}', [\App\Http\Controllers\TournamentController::class, 'matchView'])->name('match');
Route::any('/match/join/{id}', [\App\Http\Controllers\TournamentController::class, 'joinTournament'])->name('join');
Route::get('/feedback', [\App\Http\Controllers\MainController::class, 'feedback'])->middleware('auth')->name('feedback');
Route::post('/feedback/save', [\App\Http\Controllers\MainController::class, 'saveFeedback'])->name('save_feedback');


Route::middleware(['role:admin|moderator'])->prefix('admin_panel')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin');
    //  Route::get('/users',[\App\Http\Controllers\Admin\HomeController::class, 'usersView']);
    Route::get('/users', [\App\Http\Controllers\Admin\HomeController::class, 'usersView'])->name('users');
    Route::post('/users/add_ban/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'addBan'])->name('add_ban');
    Route::get('/users/unblock/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'unblock'])->name('unblock');
    Route::get('/teams', [\App\Http\Controllers\Admin\HomeController::class, 'teamsView'])->name('teams');

    Route::get('/users_card/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'userCard',]);
    Route::get('/verified/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'verified',])->name('verified');
    Route::get('/rejected/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'rejected',])->name('rejected');
    Route::get('/tournament', [\App\Http\Controllers\Admin\TournamentController::class, 'index',])->name('admin_tournament');  

    Route::get('/start/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'startTest',])->name('start');
    Route::get('/stage2/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'createStage2',])->name('stage2');
    Route::get('/stage3/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'createStage3',])->name('stage3');
    Route::get('/stages/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'stages',])->name('stages');

    Route::get('/stages/stage_1/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'stage_1',])->name('update_stage1');
    Route::get('/stages/update/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'update_stage',])->name('update_stage1_save');

    Route::get('/stages/stage_2/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'stage_2',])->name('update_stage2');
    Route::get('/stages/update_stage2/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'update_stage2',])->name('update_stage2_save');

    Route::get('/stages/stage_3/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'stage_3',])->name('update_stage3');
    Route::get('/stages/update_stage3/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'update_stage3',])->name('update_stage3_save');

    Route::get('/tournaments/draft', [\App\Http\Controllers\Admin\TournamentController::class, 'draftTournament',])->name('draft_tournament');
    Route::get('/tournaments/draft/active/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'draftTournamentsActive',])->name('draft_tournaments_active');
    Route::get('/tournaments/draft/view/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'draftTournamentsView',])->name('draft_tournament_view');
    Route::any('/tournaments/draft/edit/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'draftTournamentsEdit',])->name('draft_tournament_edit');

    Route::any('/tournament/create_tournament', [\App\Http\Controllers\Admin\TournamentController::class, 'createTournament',])->name('create_tournament');

    Route::get('/tournament/tournament_view/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'tournamentView',])->name('tournament_view');
    Route::post('/tournament/edit/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'tournamentEdit',])->name('edit_tournament');
    Route::any('/tournament/delete/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'tournamentDelete',])->name('delete_tournament');
    Route::any('/tournament/tournaments_teams/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'tournamentTeams',])->name('tournaments_teams');
    Route::any('/tournament/tournaments_teams/card/{id}{turnir_id}', [\App\Http\Controllers\Admin\TournamentController::class, 'tournamentTeamsCard',])->name('teams_card');


    Route::any('/tournament/tournaments_teams/apply_team/{id}{turnir_id}', [\App\Http\Controllers\Admin\TournamentController::class, 'applyTeam',])->name('apply_team');
    Route::any('/tournament/tournaments_teams/refuse_team/{id}{turnir_id}', [\App\Http\Controllers\Admin\TournamentController::class, 'refuseTeam',])->name('refuse_team');

    Route::any('/moderators', [\App\Http\Controllers\Admin\HomeController::class, 'moderators',])->name('moderators');
    Route::any('/moderators/create_moderators/', [\App\Http\Controllers\Admin\HomeController::class, 'createModerators',])->name('create_moderators');
    Route::get('/moderators/create_moderator/save_moderator', [App\Http\Controllers\Admin\HomeController::class, 'saveModerator'])->name('save_moderator');
    Route::get('/moderators/delete_moderators/{id}', [App\Http\Controllers\Admin\HomeController::class, 'delteModeratos'])->name('delete_moderators');

    Route::get('/help', [\App\Http\Controllers\Admin\HomeController::class, 'help',])->name('help');
    Route::get('/help/create_help', [\App\Http\Controllers\Admin\HomeController::class, 'createHelp',])->name('create_help');
    Route::any('/help/create_help/save_help', [\App\Http\Controllers\Admin\HomeController::class, 'saveHelp',])->name('save_help');
    Route::any('/help/edit_help/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'editHelp',])->name('edit_help');
    Route::post('/help/edit_help_save/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'editHelpSave',])->name('edit_help_save');

    Route::get('/admin_feedback/', [\App\Http\Controllers\Admin\HomeController::class, 'feedback',])->name('admin_feedback');
});
 //Route::get('/admin',[\App\Http\Controllers\AdminPanelController::class, 'index'])->name('admin');
//  Route::post('/admin/login',[\App\Http\Controllers\AdminPanelController::class, 'login']);
