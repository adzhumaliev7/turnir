<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileStoreRequest;
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
   
   
    $mail = Auth::user()->email;
    $status = Auth::user()->status;
    $data = UsersProfile::getById($id);
    $user_photo = UsersProfile::getUserPhoto($id);
   
    $timezones = config('app.timezones');
    $countries = config('app.countries');
    $teams = Team::getTeamById($id);
  
    $verification_status = UsersProfile::checkVerification($id);
    $tournaments = UsersProfile::getMatchesById($id, 1);
    $tournaments_old = UsersProfile::getMatchesById($id, 0);
   
   
  if($tournaments != null){
   foreach ($tournaments as $tournament) {
      $tournament_id = (array) $tournament;
   }
      $teams_count = UsersProfile::getTeamsCount($tournament_id['id']);
  }else {
    $tournaments = null;
    $teams_count = null;
  }
    return view('main.profile', [
      'mail' => $mail,
      'status' => $status,
      'data' => $data,
      'teams' => $teams,
      'user_id' => $id,
      'tournaments' => $tournaments,
      'tournaments_old' => $tournaments_old,
      'verification_status' => $verification_status,
      'timezones' => $timezones,
      'active' => $active,
      'user_name' => $user_name,
      'teams_count' => $teams_count,
      'countries'  => $countries,
      'user_photo' => $user_photo,
    ]);
  }

  public function savePhoto(Request $request){
     
    $request->validate([

      // файл должен быть картинкой (jpeg, png, bmp, gif, svg или webp)
      'logo' => 'image',
      // поддерживаемые MIME файла (image/jpeg, image/png)
      'logo' => 'mimetypes:image/jpg,image/png',
    ]);

    $logo = $request->file('logo');
    $path = '/uploads/storage/img/userslogo';
    $file_name = $this->uploadFiles($logo,$path);

    
    
    $data = array(
        'user_id' =>  Auth::user()->id,
        'photo' => $file_name,
      );

    UsersProfile::setUserPhoto($data);
    return redirect(route('profile'));   
  }


  public function saveProfile(ProfileStoreRequest $request)
  {
    $request->validate([
      // файл должен быть картинкой (jpeg, png, bmp, gif, svg или webp)
      'doc_photo' => 'image',

      // поддерживаемые MIME файла (image/jpeg, image/png)
      'doc_photo' => 'mimetypes:image/jpg,image/png',
      'doc_photo2' => 'image',

      // поддерживаемые MIME файла (image/jpeg, image/png)
      'doc_photo2' => 'mimetypes:image/jpg,image/png',
  ]);

    
  if ($request->hasFile('doc_photo') == true && $request->hasFile('doc_photo2') == true) {
    $name =  $request->file('doc_photo');
    $name2 =  $request->file('doc_photo2');
    $path = '/uploads/storage/img/verification';
    $file_name = $this->uploadFiles($name, $path);
    $file_name2 = $this->uploadFiles($name2, $path);


      } //else  return back()->withError('Документ: ' . $request->input('photo_error') . 'Загрузите фото удостоверения личности с двух сторон')->withInput();
    
    
    /*  if($request->input('game_id') != null){
      $request->validate([
       
        'game_id' => 'unique:users_profile2',
    ]);}
    
     if($request->input('game_id') != null){
      $request->validate([
     
        'game_id' => 'unique:users_profile2',
    ]); 
     } */
      $data = $validated = $request->validated();

      if ($request->hasFile('doc_photo') == true && $request->hasFile('doc_photo2') == true){
        $data['doc_photo'] = $file_name;
        $data['doc_photo2'] = $file_name2;
      }
  
      $id = Auth::user()->id;
      $data['verification'] = 'on_check';
      $data['user_id'] = $id;
      $data['status'] = 0;

    
       UsersProfile::saveProfile($data);
  
       \Session::flash('flash_meassage', 'Сохранено');
    return redirect(route('profile'));  
  }

  public function updateProfile(ProfileStoreRequest $request)
  {
    
    if ($request->hasFile('doc_photo') == true && $request->hasFile('doc_photo2') == true) {
      $name =  $request->file('doc_photo');
      $name2 =  $request->file('doc_photo2');
      $path = '/uploads/storage/img/verification';
      $file_name = $this->uploadFiles($name, $path);
      $file_name2 = $this->uploadFiles($name2, $path);
   }
     
      $data =  $validated = $request->validated();
      if ($request->hasFile('doc_photo') == true && $request->hasFile('doc_photo2') == true){
      $data['doc_photo'] = $file_name;
      $data['doc_photo2'] = $file_name2;
    }

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

    $data = $request->validate([
      'text' => 'required',
    ]);
 
    $data['user_id'] = $id;
    $data['status'] = 0;

    UsersProfile::queryUpdate($data);
    \Session::flash('flash_meassage', 'Ваш запрос отправлен');
    return redirect('profile');
  } 

  protected function uploadFiles($name, $path){
    $file_name = $name->getClientOriginalName();
   $type = $name->getClientOriginalExtension();
   if ($type == 'png') $file_type = '.png';
   elseif ($type == 'jpg') $file_type = '.jpg';
   else $file_type = '.jpeg';
   $file_name = md5($file_name) . $file_type;
   $file = $name;
   $file->move(public_path() . $path, $file_name); 
   return $file_name;
}
}
