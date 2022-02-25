<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\UsersProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\BanMail;
use App\Mail\VerifiedMail;
use App\Mail\ModeratorMail;
use App\Mail\OredrsMail;
use App\Mail\ChangeTeamMail;
use App\Mail\RejectedChangeTeam;
use App\Mail\UnblockMail;
use Illuminate\Support\Facades\Mail;
use App\CustomClasses\ColectionPaginate;
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
   
    $users = Admin::getAllUsers();
    if($users !=null) $users = ColectionPaginate::paginate($users, 15);
    return view('admin.home.users.all_users', [
      'users' => $users
    ]);
  }


  public function addBan($id, Request $request)
  {
   
    $email = Admin::getUsersEmail($id);
    $text = $request->input('text');
    Mail::to($email)->send(new BanMail($email, $text));
    Admin::addBan($id);
    return redirect(route('allusers'));  
  }
  public function unblock($id)
  {

    $email = Admin::getUsersEmail($id);
    Mail::to($email)->send(new UnblockMail($email));
   
    Admin::unblock($id);
    return redirect(route('allusers'));
  }
  public function teamsView()
  {

    $teams = Admin::getTeams();
    if($teams !=null) $teams = ColectionPaginate::paginate($teams, 15);
    return view('admin.home.teams', [
      'teams' => $teams
    ]);
  }
  public function userCard($id)
  {
    $users = Admin::getById($id);

    return view('admin.home.users.user_card', [
      'users' => $users
    ]);
  }

  public function verified($id)
  {
    $users = Admin::verified($id);
    return redirect()->to(route('allusers'));
  }
  public function rejected($id, Request $request)
  {
    $email = Admin::getUsersEmail($id);
    
    $text = $request->input('text');
    Mail::to($email)->send(new BanMail($email, $text));
    Admin::rejected($id);
    return redirect()->to(route('allusers'));
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
    Mail::to($request->input('email'))->send(new ModeratorMail($request->input('email')));
   

    // return $user;

    return redirect(route('moderators'));
  }

  public function delteModeratos($id)
  {
    Admin::delteModeratos($id);
    return redirect(route('moderators'));
  }

  public function help()
  {

    $help = Admin::getHelp();
    if($help !=null) $help = ColectionPaginate::paginate($help, 15);
    return view('admin.home.help.help', [
      'help' => $help,
    ]);
  }
  public function createHelp()
  {
    return view('admin.home.help.create_help');
  }

  public function saveHelp(Request $request)
  {
    $data  = $request->validate([

      'title' => 'required',
      'description' => 'required',
      // 'password' => Hash::make($request->input('password')),
    ]);

    Admin::createHelp($data);

    // return $user;

    return redirect(route('help'));
  }
  public function editHelp($id)
  {

    $help = Admin::getHelpById($id);
    return view('admin.home.help.edit_help', [
      'help' => $help,
    ]);
  }

  public function editHelpSave($id, Request $request)
  {


    $data = $request->validate([
      'title' => '',
      'description' => '',
    ]);

    Admin::editHelp($id, $data);
    return redirect(route('help'));
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

  public function ordersTeamApply($id, Request $request)
  {
    $emails = Admin::getTeamMembersEmail($id);

    foreach ($emails as $key => $value) {
      $emails = (array) $value;
      foreach ($emails as $key => $value) {
        $email[] = $value;
      }
    }
    Mail::to($email)->send(new ChangeTeamMail($email));

    $name = $request->input('name');
  
    Admin::changeTeamName($id, $name);
    return redirect(route('orders_team'));
  }
  public function ordersTeamRejected($id, Request $request)
  {
    $email = Admin::getTeamMembersEmailCaptain($id);
    $text = $request->input('text');
 
     Mail::to($email)->send(new RejectedChangeTeam($email, $text));
    Admin::ordersTeamRejected($id);

    return redirect(route('orders_team')); 
  }
}
