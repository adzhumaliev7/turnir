<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersProfile;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
  public function index()
  {
    $id = Auth::user()->id;
    $active = Auth::user()->verified;
    $user_name = Auth::user()->name;
   
   
    $mail = User::getEmail($id);
    $data = UsersProfile::getById($id);

    $timezones = config('app.timezones');
    $teams = Team::getTeamById($id);
    $verification_status = UsersProfile::checkVerification($id);
    $tournaments = UsersProfile::getTeamById($id);
    
  if($tournaments != null){
   foreach ($tournaments as $tournament) {
      $tournament_id = (array) $tournament;
   }
      $teams_count = UsersProfile::getTeamsCount($tournament_id['tournaments_id']);
  }else {
    $tournaments = null;
    $teams_count = null;
  }
    return view('main.profile', [
      'mail' => $mail,
      'data' => $data,
      'teams' => $teams,
      'user_id' => $id,
      'tournaments' => $tournaments,
      'verification_status' => $verification_status,
      'timezones' => $timezones,
      'active' => $active,
      'user_name' => $user_name,
      'teams_count' => $teams_count
    ]);
  }
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'email' => ['unique:users_profile2'],
      'game_id' => ['unique:users_profile2'],
    ]);
  }
  public function saveProfile(Request $request)
  {
    
    if ($request->isMethod('post')) {

      if ($request->hasFile('doc_photo') == true && $request->hasFile('doc_photo2') == true) {
        $file_name = $request->file('doc_photo')->getClientOriginalName();
        $file = $request->file('doc_photo');
        $file->move(public_path() . '/uploads/storage/img', $file_name);
      
    
        $file_name2 = $request->file('doc_photo2')->getClientOriginalName();
        $file2 = $request->file('doc_photo2');
        $file2->move(public_path() . '/uploads/storage/img', $file_name2);
        $data['doc_photo'] = $file_name;
        $data['doc_photo2'] = $file_name2;
      } //else  return back()->withError('Документ: ' . $request->input('photo_error') . 'Загрузите фото удостоверения личности с двух сторон')->withInput();
    }

    $this->validator($request->all())->validate();
      $data = $request->validate([
        'doc_photo' => '',
        'doc_photo2' => '',
        'phone' => '',
        'fio' => '',
        'login' => '',
        'email' => '',
        'country' => '',
        'timezone' => '',
        'city' => '',
        'bdate' => '',
        'nickname' => '',
        'game_id' => ''
      
      ]);
      $id = Auth::user()->id;
      $data['verification'] = 'on_check';
      $data['user_id'] = $id;
      $data['status'] = 0;
    
     // try {
        UsersProfile::saveProfile($data);
     /*  } catch (\Illuminate\Database\QueryException  $exception) {
        return back()->withError('Email ' . $request->input('email') . ' уже занят'. $exception)->withInput();
      } */
    

    \Session::flash('flash_meassage', 'Сохранено');
    return redirect(route('profile')); 
  }

  public function updateProfile(Request $request)
  {

    if ($request->isMethod('post')) {

      if ($request->hasFile('doc_photo') == true && $request->hasFile('doc_photo2') == true) {
        $file_name = $request->file('doc_photo')->getClientOriginalName();
        $file = $request->file('doc_photo');
        $file->move(public_path() . '/uploads/storage/img', $file_name);


        $file_name2 = $request->file('doc_photo2')->getClientOriginalName();
        $file2 = $request->file('doc_photo2');
        $file2->move(public_path() . '/uploads/storage/img', $file_name2);
      }
    }


    $data = $request->validate([
      'doc_photo' => '',
      'doc_photo2' => '',
      'phone' => '',
      'fio' => '',
      'login' => '',
      'email' => '',
      'country' => '',
      'timezone' => '',
      'city' => '',
      'bdate' => '',
      'nickname' => '',
      'game_id' => ''
    ]);
    $id = Auth::user()->id;
    $data['status'] = 0;
    $data['user_id'] = $id;
   
    try {
      UsersProfile::updateProfile($id, $data);
    } catch (\Illuminate\Database\QueryException  $exception) {
      return back()->withError('Email ' . $request->input('email') . ' уже занят')->withInput();
    }


    \Session::flash('flash_meassage', 'Сохранено');
    return redirect(route('profile'));
  }

  public function createTeam(Request $request)
  {

    $data = $request->validate([

      'name' => 'required',
    ]);
    $id = Auth::user()->id;
    $data['user_id'] = $id;
    $data['role'] = 'captain';
    $data_m = array(
      'user_id' => $id,
      'role' => 'captain',
    );

    try {
      $status = Team::createTeam($data, $data_m, $id);
    } catch (\Illuminate\Database\QueryException  $exception) {
      return back()->withError('Комнда ' . $request->input('name') . ' уже существует')->withInput();
    }

    if ($status == true) {
      \Session::flash('flash_meassage2', 'Сохранено');
      return redirect('profile');
    } else {
      \Session::flash('flash_meassage_error', 'У вас уже есть команда');
      return redirect('profile');
    }
  }
  public function deleteProfile($id)
  {
    UsersProfile::delete_profile($id);
    return redirect('login');
  }

  public function query($id, Request $request){
    $text = $request->input('text');
    $data =array(
      'user_id' =>$id,
      'text' => $text,
      'status' => 0
    );
    UsersProfile::queryUpdate($data);
    \Session::flash('flash_meassage_error', 'Ваш запрос отправлен');
    return redirect('profile');
  } 
  public function getTournaments($id)
  {
    
  }
}
