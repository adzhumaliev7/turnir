<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Team;
use App\Models\Post;
use App\Models\Log;
use App\Models\Log_users;
use App\Models\UsersProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\BanMail;
use App\Mail\VerifiedMail;
use App\Mail\ModeratorMail;
use App\Mail\OredrsMail;
use App\Mail\ChangeTeamMail;
use App\Mail\RejectedChangeTeam;
use App\Mail\RejectedVerifiedMail;
use App\Mail\UnblockMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\CustomClasses\ColectionPaginate;
use Carbon\Carbon;
use Laravel\Ui\Presets\React;

class HomeController extends Controller
{
  public function index()
  {
    $users = Admin::getUsersCount();
    $teams = Admin::getTeamsCount();

    return view('admin.home.index', [
      'users' => $users,
      'teams' => $teams,
    ]);
  }
  public function usersView()
  {
    $users = Admin::get();
    if ($users == NULL) {
      $users == "";
    }
    // dd($users, User::all());
    return view('admin.home.users.users', [
      'users' => $users
    ]);
  }
  public function allUsers()
  {
   // 
   
   /*  $users = Admin::getAllUsers();
    if($users !=null) $users = ColectionPaginate::paginate($users, 15);
    return view('admin.home.users.all_users', [
      'users' => $users
    ]); */

    return view('admin.home.users.all_users');
  }

  public function userVerified()
  {
    return view('admin.home.users.verified_users');
   /*  $users = Admin::getVerifiedUsers();
    if($users !=null) $users = ColectionPaginate::paginate($users, 15);
    return view('admin.home.users.verified_users', [
      'users' => $users
    ]); */
  }
  public function verification()
  {

    
    return view('admin.home.users.on_check_users');
  /*   $users = Admin::getVerificationUsers();
  
    if($users !=null) $users = ColectionPaginate::paginate($users, 15);
    return view('admin.home.users.on_check_users', [
      'users' => $users
    ]); */
  }
  public function blocked()
  {
  /*   $users = Admin::blocked();
  
    if($users !=null) $users = ColectionPaginate::paginate($users, 15);
    return view('admin.home.users.blocked', [
      'users' => $users
    ]); */
    return view('admin.home.users.blocked');
  }
  public function teamsView()
  {
    return view('admin.home.teams.teams');
  }
  public function userCard($id)
  {
    $user = User::leftJoin('users_logo', 'users_logo.user_id', '=', 'users.id')->select('users.*', 'users_logo.photo')->findOrFail($id);
    
  
   $status = $user->verified == 1 ? 'Активирован' : 'Зарегистрирован';
   $status .= '/';
   $status .= $user->nickname != null && $user->game_id != null ? 'Игровой' : 'Не игровой';
   $logs = $user->logsFull();

    return view('admin.home.users.user_card_new2', compact('user', 'logs', 'status'));
  }

  public function moderators()
  {
    $moderators = Admin::getModerators();
    if($moderators !=null) $moderators = ColectionPaginate::paginate($moderators, 15);
    return view('admin.home.moderators.moderators', [
      'moderators' => $moderators,
    ]);
  }
  public function createModerators()
  {

    return view('admin.home.moderators.create_moderators');
  }
  protected function validator(array $data)
    {
        return Validator::make($data, [
           
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          
        ]);
    }
  public function saveModerator(Request $request)
  {
   
    $this->validator($request->all())->validate();
    $user =User::create($request->all());
    $user->assignRole('moderator');
    Mail::to($request->input('email'))->send(new ModeratorMail($request->input('email'), $request->input('password')));
  
    // return $user;
    return redirect(route('moderators'));
  }

  public function delteModeratos($id)
  {
    Admin::delteModeratos($id);
    return redirect(route('moderators'));
  }
  public function changePsswordModeratorView($id)
  {
    
    return view('admin.home.moderators.change_password', [
    'id' => $id,
  ]);
  }

  public function updatePsswordModerator($id,Request $request)
  {
    $validator = Validator::make($request->all(), [
      'password' => ['required'],
     
  ]);
    $password = Hash::make($request->input('password'));
    User::changePassword($id, $password);
    \Session::flash('flash_meassage', 'Новый пароль сохранен');
    return redirect(route('moderators')); 
  }


  public function feedback()
  {
    $feedback = Admin::getFeedback();
    if($feedback !=null) $feedback = ColectionPaginate::paginate($feedback, 15);

    return view('admin.home.feedback', [
      'feedbacks' => $feedback,
    ]);
  }
  public function orders()
  {
    $orders = Admin::getOrders();
    if($orders !=null) $orders = ColectionPaginate::paginate($orders, 15);
    return view('admin.home.users.orders', [
      'orders' => $orders,
    ]);
  }
  public function ordersApply($id)
  {
    Admin::ordersApply($id);
    return redirect(route('orders'));
  }
  public function ordersrejected($id, Request $request)
  {
    $email = Admin::getUsersEmail($id);
   

    $text = $request->input('text');
    Mail::to($email)->send(new OredrsMail($email, $text));
    Admin::ordersrejected($id);
    return redirect(route('orders'));
  }

  public function ordersTeam()
  {
    $orders = Admin::getOrdersTeam();
    if($orders !=null)  $orders = ColectionPaginate::paginate($orders, 15);
    return view('admin.home.orders_team', [
      'orders' => $orders,
    ]);
  }

  public function ordersTeamApply($id, $oldname, Request $request)
  {

    $team = Team::with('teammatesTeam.user')->findOrFail($id);
    $emails = $team->teammatesTeam->pluck('user.email')->toArray();

    Mail::to($emails)->send(new ChangeTeamMail($emails));
    $name = $request->input('name');

    Admin::changeTeamName($id, $name);
    $team->logs()->create(['old_value' => $oldname, 'new_value' => $name, 'log_type' => 2, 'user_id'=> Auth::id()]);

    return redirect()->route('orders_team');
  }
  
  public function ordersTeamRejected($id, Request $request)
  {
    $email = Admin::getTeamMembersEmailCaptain($id);
    $text = $request->input('text');
 
     Mail::to($email)->send(new RejectedChangeTeam($email, $text));
    Admin::ordersTeamRejected($id);
   

    return redirect(route('orders_team')); 
  }

  public function search(Request $request)
{
  $search = $request->input('search');
  //$users = User::where('email','like' ,"%{$search}%")->get(); // кавычки двойные!
  $users = DB::table('users')
   ->join('team_members', 'users.id', '=', 'team_members.user_id')
  ->join('team', 'team_members.team_id', '=' , 'team.id')
  ->select('users.*', 'team.name as team_name')
  ->orwhere('users.email', 'like' ,"%{$search}%")->orwhere('users.name', 'like' ,"%{$search}%")
  ->get();
  if($users !=null) $users = ColectionPaginate::paginate($users, 15);
  return view('admin.home.users.all_users', [
    'users' => $users
  ]);
}
}
