<?php
//
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


Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('main');
Auth::routes();
Route::name('user.')->group(function () {
    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect(route('main'));
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
    Route::get('/registration', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('registration');
    Route::post('/registration', [\App\Http\Controllers\Auth\RegisterController::class, 'create']);
});
 Route::get('/registration/confirm/{token}', [\App\Http\Controllers\Auth\RegisterController::class, 'confirmEmail']);
Route::get('/registration/message/', [\App\Http\Controllers\Auth\RegisterController::class, 'confirmSendMessage'])->name('confirm_message');
Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile/createprofile', [\App\Http\Controllers\ProfileController::class, 'saveProfile'])->name('create_profile');
Route::post('/profile/update/', [\App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('update_profile');
Route::get('/profile/delte/{id}', [\App\Http\Controllers\ProfileController::class, 'deleteProfile'])->name('delete_profile');
Route::post('/profile/createteam', [\App\Http\Controllers\ProfileController::class, 'createTeam'])->name('createteam');
Route::post('/profile/tournaments/{id}', [\App\Http\Controllers\ProfileController::class, 'getTournaments'])->name('get_tournaments');
Route::post('/profile/changepassword', [\App\Http\Controllers\ProfileController::class, 'changePassword'])->name('changepassword');
Route::post('/profile/query/{id}', [\App\Http\Controllers\ProfileController::class, 'query'])->name('query');
Route::post('/profile/save_photo', [\App\Http\Controllers\ProfileController::class, 'savePhoto'])->name('save_photo');
Route::get('/main', [\App\Http\Controllers\MainController::class, 'index'])->name('main');
Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news');
Route::get('/help', [\App\Http\Controllers\HelpController::class, 'index'])->name('main.help');
Route::get('/news/{id}/show', [\App\Http\Controllers\NewsController::class, 'show'])->name('news.show');
Route::get('/team/{id}/{user_id}', [\App\Http\Controllers\TeamController::class, 'index'])->middleware('auth')->name('team');

Route::get('/generate/{id}/{user_id}', [\App\Http\Controllers\TeamController::class, 'generateLink'])->name('generate_link');
Route::get('/addmembers/apply/{id}', [\App\Http\Controllers\TeamController::class, 'addMembersApply'])->name('addmembe_apply');
Route::get('/teams/exit/{id}/{team_id}', [\App\Http\Controllers\TeamController::class, 'exitTeam'])->name('exit_team');
Route::get('/team/delete/{id}/{team_id}', [\App\Http\Controllers\TeamController::class, 'deleteMember'])->name('delete_member');
Route::get('/delete_team/{team_id}', [\App\Http\Controllers\TeamController::class, 'deleteTeam'])->name('delete_team');
Route::post('/team/orders_team/{id}', [\App\Http\Controllers\TeamController::class, 'ordersTeam'])->name('orders_team_user');
Route::get('/team/add_admin/{id}/{team_id}/{oldadmin}', [\App\Http\Controllers\TeamController::class, 'addAdmin'])->name('add_admin');
Route::post('/team/add_networks/{id}', [\App\Http\Controllers\TeamController::class, 'addNetworks'])->name('add_networks');
Route::post('/team/add_networks_update/{id}', [\App\Http\Controllers\TeamController::class, 'addNetworksUpdate'])->name('add_networks_update');
Route::post('/team/set_logo/{id}', [\App\Http\Controllers\TeamController::class, 'setLogo'])->name('set_logo');
Route::get('/tournament', [\App\Http\Controllers\TournamentController::class, 'index'])->name('tournament');
Route::any('tournament/create_order', [\App\Http\Controllers\TournamentController::class, 'createTournament'])->name('create_order');
Route::post('tournament/create_order/save', [\App\Http\Controllers\TournamentController::class, 'saveTournament'])->name('save_order');
Route::get('pages/{id}/{slug}', [\App\Http\Controllers\MainController::class, 'page'])->name('page');

Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/terms', [\App\Http\Controllers\TermsController::class, 'index'])->name('terms');
 

//Route::get('/match/{id}', [\App\Http\Controllers\TournamentController::class, 'matchView'])->name('match');
Route::get('/tournaments/{turnirId}/standings/{stageId?}/{groupId?}', [\App\Http\Controllers\TournamentController::class, 'matchViewNew'] )->name('match');



Route::any('/match/join/{id}', [\App\Http\Controllers\TournamentController::class, 'joinTournament'])->name('join')->middleware('auth');
Route::get('match/revoke/{id}/{team_id}', [\App\Http\Controllers\TournamentController::class, 'revokeOrder'])->name('revoke')->middleware('auth');
Route::get('/feedback', [\App\Http\Controllers\MainController::class, 'feedback'])->name('feedback');
Route::post('/feedback/save', [\App\Http\Controllers\MainController::class, 'saveFeedback'])->name('save_feedback');
Route::get('/rating', [\App\Http\Controllers\MainController::class, 'rating'])->name('rating'); 
//////////////////////
Route::get('verify/resend', [\App\Http\Controllers\Auth\TwoFactorController::class, 'resend'])->name('verify.resend');
Route::resource('verify', \App\Http\Controllers\Auth\TwoFactorController::class)->only(['index', 'store']);
Route::middleware(['role:admin|moderator', 'auth', 'twofactor'],)->prefix('admin_panel')->group(function () {

    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin');
    //  Route::get('/users',[\App\Http\Controllers\Admin\HomeController::class, 'usersView']);
    Route::get('/users', [\App\Http\Controllers\Admin\HomeController::class, 'usersView'])->name('users');
    Route::get('/allusers', [\App\Http\Controllers\Admin\HomeController::class, 'allUsers'])->name('allusers');
    Route::get('users/verified', [\App\Http\Controllers\Admin\HomeController::class, 'userVerified'])->name('verifiedAt');
    Route::get('users/verification', [\App\Http\Controllers\Admin\HomeController::class, 'verification'])->name('verification');
    Route::get('users/blocked', [\App\Http\Controllers\Admin\HomeController::class, 'blocked'])->name('blocked');
    Route::post('/users/add_ban/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'addBan'])->name('add_ban');
    Route::get('/users/unblock/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'unblock'])->name('unblock');
    Route::get('/teams', [\App\Http\Controllers\Admin\HomeController::class, 'teamsView'])->name('teams');
    Route::get('/orders', [\App\Http\Controllers\Admin\HomeController::class, 'orders'])->name('orders');
    Route::get('/orders/apply/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'ordersApply'])->name('orders_apply');
    Route::post('/orders/rejected/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'ordersRejected'])->name('orders_rejected');
    Route::get('/orders_team', [\App\Http\Controllers\Admin\HomeController::class, 'ordersTeam'])->name('orders_team');
    Route::post('/orders_team/apply/{id}/{oldname}/{order_id}', [\App\Http\Controllers\Admin\HomeController::class, 'ordersTeamApply'])->name('orders_team_apply');
    Route::post('/orders_team/rejected/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'ordersTeamRejected'])->name('orders_team_rejected');

    Route::get('/users_card/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'userCard',])->name('users_card');
    Route::get('/verified/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'verified',])->name('verified');
    Route::post('/rejected/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'rejected',])->name('rejected');
    Route::get('/tournament', [\App\Http\Controllers\Admin\TournamentController::class, 'index',])->name('admin_tournament');


    Route::get('/activate', [\App\Http\Controllers\Admin\HomeController::class, 'usersActivateView'])->name('activateView');
    Route::get('/activate/store/{id}', [\App\Http\Controllers\Admin\HomeController::class, 'usersActivate'])->name('activate');

    //Нровсти 
    Route::get('/posts', [\App\Http\Controllers\Admin\PostsController::class, 'posts',])->name('admin.posts');
    Route::get('/posts/create', [\App\Http\Controllers\Admin\PostsController::class, 'posts_create',])->name('admin.posts.create');
    Route::post('/posts/store', [\App\Http\Controllers\Admin\PostsController::class, 'posts_store',])->name('admin.posts.store');
    Route::get('/posts/{id}/edit', [\App\Http\Controllers\Admin\PostsController::class, 'edit',])->name('admin.posts.edit');
    Route::post('/posts/{id}/update', [\App\Http\Controllers\Admin\PostsController::class, 'update',])->name('admin.posts.update');
    Route::get('/posts/{id}/delete', [\App\Http\Controllers\Admin\PostsController::class, 'destroy',])->name('admin.posts.delete');
    Route::get('/posts/uploadfiles', [\App\Http\Controllers\Admin\PostsController::class, 'uploadfiles',])->name('admin.posts.upload');
    Route::get('/posts/deletefiles', [\App\Http\Controllers\Admin\PostsController::class, 'deletefile',])->name('admin.posts.deletefile');

    Route::get('/log_apply_teams', [\App\Http\Controllers\Admin\TournamentController::class, 'logApplyAeams'])->name('log_apply_teams');
    Route::get('/log_rejected_teams', [\App\Http\Controllers\Admin\TournamentController::class, 'logRejectedTeams'])->name('log_rejected_teams');

    Route::get('/stages/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'stages',])->name('stages');

    Route::post('/ckeditor/upload', [\App\Http\Controllers\Admin\CkeditorController::class, 'upload',])->name('ckeditor.image-upload');

    Route::get('/tournaments/draft', [\App\Http\Controllers\Admin\TournamentController::class, 'draftTournament',])->name('draft_tournament');
    Route::get('/tournaments/draft/active/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'draftTournamentsActive',])->name('draft_tournaments_active');
    Route::get('/tournaments/draft/view/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'draftTournamentsView',])->name('draft_tournament_view');
    Route::any('/tournaments/draft/edit/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'draftTournamentsEdit',])->name('draft_tournament_edit');

    Route::get('/tournament/create_tournament', [\App\Http\Controllers\Admin\TournamentController::class, 'createTournament',])->name('create_tournament');
    Route::post('/tournament/store_tournament', [\App\Http\Controllers\Admin\TournamentController::class, 'storeTournament',])->name('store_tournament');

    Route::get('/tournament/tournament_view/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'tournamentView',])->name('tournament_view');
    Route::post('/tournament/edit/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'tournamentEdit',])->name('edit_tournament');
    Route::any('/tournament/delete/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'tournamentDelete',])->name('delete_tournament');
    Route::any('/tournament/tournaments_teams/{id}', [\App\Http\Controllers\Admin\TournamentController::class, 'tournamentTeams',])->name('tournaments_teams');
    Route::any('/tournament/tournaments_teams/card/{id}/{turnir_id}', [\App\Http\Controllers\Admin\TournamentController::class, 'tournamentTeamsCard',])->name('teams_card');
    Route::get('/tournament/tournaments_about/{turnir_id}', [\App\Http\Controllers\Admin\TournamentController::class, 'tournamentsAbout',])->name('tournaments_about');
    Route::any('/tournament/tournaments_about/create_stage/{turnir_id}', [\App\Http\Controllers\Admin\TournamentController::class, 'createStage',])->name('create_stage');
    Route::any('/tournament/tournaments_about/create_group/{turnir_id}/{stage_id}', [\App\Http\Controllers\Admin\TournamentController::class, 'createGroup',])->name('create_group');


    Route::any('/tournament/tournaments_teams/apply_team/{id}/{turnir_id}', [\App\Http\Controllers\Admin\TournamentController::class, 'applyTeam',])->name('apply_team');
    Route::any('/tournament/tournaments_teams/refuse_team/{id}/{turnir_id}/{user_id}', [\App\Http\Controllers\Admin\TournamentController::class, 'refuseTeam',])->name('refuse_team');

    Route::any('/moderators', [\App\Http\Controllers\Admin\HomeController::class, 'moderators',])->name('moderators');
    Route::any('/moderators/create_moderators/', [\App\Http\Controllers\Admin\HomeController::class, 'createModerators',])->name('create_moderators');
    Route::get('/moderators/create_moderator/save_moderator', [App\Http\Controllers\Admin\HomeController::class, 'saveModerator'])->name('save_moderator');
    Route::get('/moderators/delete_moderators/{id}', [App\Http\Controllers\Admin\HomeController::class, 'delteModeratos'])->name('delete_moderators');

    Route::get('/moderators/change/{id}', [App\Http\Controllers\Admin\HomeController::class, 'changePsswordModeratorView'])->name('change_password');
    Route::post('/moderators/store/{id}', [App\Http\Controllers\Admin\HomeController::class, 'updatePsswordModerator'])->name('store_password');

    Route::get('/admin/change', [App\Http\Controllers\Admin\HomeController::class, 'updatePasswordAdmin'])->name('admin_settings');
    Route::post('/admin/change/store/{id}', [App\Http\Controllers\Admin\HomeController::class, 'storePasswordAdmin'])->name('store_admin');
	Route::resource('/meta', 'App\Http\Controllers\Admin\MetaController')->names('admin.meta');

    Route::get('/help', [\App\Http\Controllers\Admin\HelpController::class, 'index',])->name('admin.help');
    Route::get('/help/create', [\App\Http\Controllers\Admin\HelpController::class, 'create',])->name('admin.help.create');
    Route::post('/help/store', [\App\Http\Controllers\Admin\HelpController::class, 'store',])->name('admin.help.store');
    Route::get('/help/{id}/edit', [\App\Http\Controllers\Admin\HelpController::class, 'edit',])->name('admin.help.edit');
    Route::post('/help/{id}/update', [\App\Http\Controllers\Admin\HelpController::class, 'update',])->name('admin.help.update');
    Route::get('/help/{id}/delete', [\App\Http\Controllers\Admin\HelpController::class, 'destroy',])->name('admin.help.delete');

    Route::get('/help/filter', [\App\Http\Controllers\Admin\HelpController::class, 'filter',])->name('admin.help.filter');
    Route::post('/help/filter/store', [\App\Http\Controllers\Admin\HelpController::class, 'filter_store',])->name('admin.help.filter.store');

    Route::get('/pages', [\App\Http\Controllers\Admin\PagesController::class, 'index',])->name('admin.pages');
    Route::get('/pages/create', [\App\Http\Controllers\Admin\PagesController::class, 'create',])->name('admin.pages.create');
    Route::post('/pages/store', [\App\Http\Controllers\Admin\PagesController::class, 'store',])->name('admin.pages.store');

    Route::get('/pages/{id}/edit', [\App\Http\Controllers\Admin\PagesController::class, 'edit',])->name('admin.pages.edit');
    Route::post('/pages/{id}/update', [\App\Http\Controllers\Admin\PagesController::class, 'update',])->name('admin.pages.update');
    Route::get('/pages/{id}/delete', [\App\Http\Controllers\Admin\PagesController::class, 'destroy',])->name('admin.pages.delete');

    Route::get('/admin_feedback', [\App\Http\Controllers\Admin\HomeController::class, 'feedback',])->name('admin_feedback');
    Route::get('/search' , [\App\Http\Controllers\Admin\HomeController::class, 'search'])->name('search');

    // Тут начинаются мои машруты

    //отоброжение всей таблицы в турнире сортирует по этапам группам и дублирование турнира
    Route::get('/tournaments/{turnirId}/standings/{stageId?}/{groupId?}', [\App\Http\Controllers\Admin\PattyController::class, 'standings',] )->name('standings');
    Route::get('/duplication/{turnirId}', [\App\Http\Controllers\Admin\PattyController::class, 'duplication',] )->name('duplication');

    //Эти трёх машрута отображает форму для создание группы в нужном турнире и этапе а второй машрут сохраняет группу, третий машрут удаляет группу
    Route::get('/group/{turnirId}/{stageId}/create', [\App\Http\Controllers\Admin\GroupController::class, 'create',] )->name('group.create');
    Route::post('/group', [\App\Http\Controllers\Admin\GroupController::class, 'store',] )->name('group.store');
    Route::get('/group/{groupId}', [\App\Http\Controllers\Admin\GroupController::class, 'destroy',] )->name('group.destroy');
    Route::get('/group/{groupId}/edit', [\App\Http\Controllers\Admin\GroupController::class, 'edit',] )->name('group.edit');
    Route::put('/group/{groupId}', [\App\Http\Controllers\Admin\GroupController::class, 'update',] )->name('group.update');
    //Эти три машрута отображает форму для создание этапа в нужном турнире а второй машрут сохраняет этап третий удаляет этап
    Route::get('/stoge{turnirId}/create', [\App\Http\Controllers\Admin\StageController::class, 'create',] )->name('stoge.create');
    Route::post('/stoge', [\App\Http\Controllers\Admin\StageController::class, 'store',] )->name('stoge.store');
    Route::get('/stoge/{stogeId}', [\App\Http\Controllers\Admin\StageController::class, 'destroy',] )->name('stoge.destroy');
    Route::get('/stoge/{stogeId}/edit', [\App\Http\Controllers\Admin\StageController::class, 'edit',] )->name('stoge.edit');
    Route::put('/stoge/{stogeId}', [\App\Http\Controllers\Admin\StageController::class, 'update',] )->name('stoge.update');
    //Просмотр команды, форма показа добавление команд к группе, сохранение команд к группе и удаление команды из группы
    Route::get('/team/{turnirId}/{groupId}/create', [\App\Http\Controllers\Admin\TeamsController::class, 'create',] )->name('team.create');
    Route::post('/team', [\App\Http\Controllers\Admin\TeamsController::class, 'store',] )->name('team.store');
    Route::get('/team/{tournamentGroupTeamsId}/destroy', [\App\Http\Controllers\Admin\TeamsController::class, 'destroy',] )->name('team.destroy');
    Route::post('/team/join/{turnirId}/{teamId}', [\App\Http\Controllers\Admin\TeamsController::class, 'joinTournament'])->name('team.join');
    Route::get('/teams/{teamId}', [\App\Http\Controllers\Admin\HomeController::class, 'show'])->name('teams.show');
    //Машруты для матчей добавление матча к группе, сохранение матча к греппе, добавление результа матча команды, сохранения результата матча команде
    Route::get('/matches/{teamId}/edit', [\App\Http\Controllers\Admin\MatchesController::class, 'edit',] )->name('matches.edit');
    Route::post('/matches/matchesResultStore', [\App\Http\Controllers\Admin\MatchesController::class, 'matchesResultStore',] )->name('matches.matchesResultStore');
    Route::get('/matches/{groupId}/create', [\App\Http\Controllers\Admin\MatchesController::class, 'create',] )->name('matches.create'); //+
    Route::post('/matches/update', [\App\Http\Controllers\Admin\MatchesController::class, 'update',] )->name('matches.update');



    // Тут начинаются мои машруты

    //отоброжение всей таблицы в турнире сортирует по этапам группам и дублирование турнира
    Route::get('/tournaments/{turnirId}/standings/{stageId?}/{groupId?}', [\App\Http\Controllers\Admin\PattyController::class, 'standings',] )->name('standings');
    Route::get('/duplication/{turnirId}', [\App\Http\Controllers\Admin\PattyController::class, 'duplication',] )->name('duplication');

    //Эти трёх машрута отображает форму для создание группы в нужном турнире и этапе а второй машрут сохраняет группу, третий машрут удаляет группу
    Route::get('/group/{turnirId}/{stageId}/create', [\App\Http\Controllers\Admin\GroupController::class, 'create',] )->name('group.create');
    Route::post('/group', [\App\Http\Controllers\Admin\GroupController::class, 'store',] )->name('group.store');
    Route::get('/group/{groupId}', [\App\Http\Controllers\Admin\GroupController::class, 'destroy',] )->name('group.destroy');
    Route::get('/group/{groupId}/edit', [\App\Http\Controllers\Admin\GroupController::class, 'edit',] )->name('group.edit');
    Route::put('/group/{groupId}', [\App\Http\Controllers\Admin\GroupController::class, 'update',] )->name('group.update');
    //Эти три машрута отображает форму для создание этапа в нужном турнире а второй машрут сохраняет этап третий удаляет этап
    Route::get('/stoge{turnirId}/create', [\App\Http\Controllers\Admin\StageController::class, 'create',] )->name('stoge.create');
    Route::post('/stoge', [\App\Http\Controllers\Admin\StageController::class, 'store',] )->name('stoge.store');
    Route::get('/stoge/{stogeId}', [\App\Http\Controllers\Admin\StageController::class, 'destroy',] )->name('stoge.destroy');
    Route::get('/stoge/{stogeId}/edit', [\App\Http\Controllers\Admin\StageController::class, 'edit',] )->name('stoge.edit');
    Route::put('/stoge/{stogeId}', [\App\Http\Controllers\Admin\StageController::class, 'update',] )->name('stoge.update');
    //Просмотр команды, форма показа добавление команд к группе, сохранение команд к группе и удаление команды из группы
    Route::get('/team/{tournamentGroupTeamsId}/mathe', [\App\Http\Controllers\Admin\TeamsController::class, 'showMath',] )->name('team.show');

    Route::get('/team/{turnirId}/{groupId}/create', [\App\Http\Controllers\Admin\TeamsController::class, 'create',] )->name('team.create');
    Route::post('/team', [\App\Http\Controllers\Admin\TeamsController::class, 'store',] )->name('team.store');
    Route::get('/team/{tournamentGroupTeamsId}/destroy', [\App\Http\Controllers\Admin\TeamsController::class, 'destroy',] )->name('team.destroy');
    Route::post('/team/join/{turnirId}/{teamId}', [\App\Http\Controllers\Admin\TeamsController::class, 'joinTournament'])->name('team.join');
    Route::get('/team/delete/{tournametsTeamId}', [\App\Http\Controllers\Admin\TeamsController::class, 'deleteOrder'])->name('team.delete');
    //для таблички при добавление команд к турниру
    Route::get('/getDataTeamList', [\App\Http\Controllers\Admin\TeamsController::class, 'getDataList',] )->name('getDataTeamList');

    //Машруты для матчей добавление матча к группе, сохранение матча к греппе, добавление результа матча команды, сохранения результата матча команде
    Route::get('/matches/{teamId}/edit', [\App\Http\Controllers\Admin\MatchesController::class, 'edit',] )->name('matches.edit');
    Route::post('/matches/matchesResultStore', [\App\Http\Controllers\Admin\MatchesController::class, 'matchesResultStore',] )->name('matches.matchesResultStore');
    Route::get('/matches/{groupId}/create', [\App\Http\Controllers\Admin\MatchesController::class, 'create',] )->name('matches.create'); //+
    Route::post('/matches/update', [\App\Http\Controllers\Admin\MatchesController::class, 'update',] )->name('matches.update');

    Route::get('/finish/{turnirId}', [\App\Http\Controllers\Admin\PattyController::class, 'finish',] )->name('finish');



    Route::get('/getDataTeamAllList', [\App\Http\Controllers\Admin\TeamsController::class, 'getDataAllList',] )->name('getDataTeamAllList');
    Route::get('/getDataTurnirList', [\App\Http\Controllers\Admin\TournamentController::class, 'getDataList',] )->name('getDataTurnirList');

    Route::get('/getDataUserAllList', [\App\Http\Controllers\Admin\UserController::class, 'getDataList',] )->name('getDataUserAllList');

    Route::get('/teams/{teamId}', [\App\Http\Controllers\Admin\TeamsController::class, 'show'])->name('teams.show');
    Route::post('/teamsBan', [\App\Http\Controllers\Admin\TeamsController::class, 'ban'])->name('teams.ban');

    Route::get('/verified/{id}', [\App\Http\Controllers\Admin\UserController::class, 'verified',])->name('verified');
    Route::post('/rejected/{id}', [\App\Http\Controllers\Admin\UserController::class, 'rejected',])->name('rejected');
    Route::post('/users/ban', [\App\Http\Controllers\Admin\UserController::class, 'ban'])->name('user.ban');
});
//
Route::get('/{link}/{id}', [\App\Http\Controllers\TeamController::class, 'addMembers'])->name('addmember')->middleware('auth');
//	
//
