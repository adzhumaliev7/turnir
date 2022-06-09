<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileStoreRequest;
use App\Models\UsersProfile;
use App\Models\Team;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{

  
  public function index()
  {
    $id = Auth::user()->id;
    $active = Auth::user()->verified;
    $user_name = Auth::user()->name;
   
  
    $mail = Auth::user()->email;
    $status = Auth::user()->status;
 $user = User::findorfail($id);
    $user_photo = UsersProfile::getUserPhoto($id);
 $active =  Auth::user()->verified;
    $timezones = config('app.timezones');
    $countries = config('app.countries');
    $teams = Team::getTeamById($id);
    $team_id = Team::getTeamId($id);

    $verification_status = UsersProfile::checkVerification($id);
    $tournaments = UsersProfile::getMatchesById($team_id,$id, 1);
    
    $tournaments_old = UsersProfile::getMatchesById($team_id, $id, 0);
    $checkTurnir =UsersProfile::checkTurnir($team_id);
   
    return view('main.profile', [
      'mail' => $mail,
      'status' => $status,
    
      'teams' => $teams,
      'user_id' => $id,
      'tournaments' => $tournaments,
      'tournaments_old' => $tournaments_old,
      'verification_status' => $verification_status,
      'timezones' => $timezones,
      'active' => $active,
      'user_name' => $user_name,
     'checkTurnir' => $checkTurnir,
      'countries'  => $countries,
      'user_photo' => $user_photo,
	'active' => $active,
		 'user'=> $user,
    ]);
  }

  public function savePhoto(Request $request){
     
    $request->validate([

      'logo' => 'image',

      // поддерживаемые MIME файла (image/jpeg, image/png)
      'logo' => 'mimetypes:image/jpeg,image/png',
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



  public function updateProfile(ProfileStoreRequest $request)
  {
      
          $request->validate([

      // файл должен быть картинкой (jpeg, png, bmp, gif, svg или webp)
     'doc_photo' => 'image',

     // поддерживаемые MIME файла (image/jpeg, image/png)
     'doc_photo' => 'mimetypes:image/jpeg,image/png|max:2000',

        // файл должен быть картинкой (jpeg, png, bmp, gif, svg или webp)
        'doc_photo2' => 'image',

        // поддерживаемые MIME файла (image/jpeg, image/png)
        'doc_photo2' => 'mimetypes:image/jpeg,image/png|max:2000',

 ]);
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

   
    $verification = UsersProfile::getById(Auth::user()->id);
      if ($request->hasFile('doc_photo') == true && $request->hasFile('doc_photo2') == true){
      
      if($verification['verification'] =='rejected'){
         $data['verification'] = 'on_check'; 
      }
      elseif($verification['verification'] =='verified'){
         $data['verification'] = 'verified'; 
      }else $data['verification'] = 'on_check'; 
  }
  else  
    $data['verification'] = NULL;
  
   $user = User::find(Auth::user()->id);
  
    $data['exist_status'] = 0;
    if($request->input('name') != $user->name ){
      $request->validate([
        'name' => 'unique:users',
    ]);
    }

    if($request->input('nickname') != $user->nickname ){
      $request->validate([
    
        'nickname' => 'unique:users,nickname',
    ]);
    }
    if($request->input('game_id') != $user->game_id ){
      $request->validate([
     
        'game_id' => 'unique:users,game_id',
    ]); 
     } 
	  
      if($request->input('game_id') != $user->game_id){
        Log::create([
          'model_type' => 'App\Models\User',
          'model_id' => Auth::user()->id,
          'log_type' => '6',
          'old_value' => $user->game_id ?? '',
          'new_value' => $request->input('game_id'),
          'user_id' => '',
      ]);
      }
       if($request->input('nickname') != $user->nickname  ){
        Log::create([
          'model_type' => 'App\Models\User',
          'model_id' => Auth::user()->id,
          'log_type' => '5',
          'old_value' => $user->nickname ?? '',
          'new_value' =>  $request->input('nickname'),
          'user_id' => '',
      ]);
      }  
	  $user->update($data);   
    \Session::flash('flash_meassage', 'Сохранено');
    return redirect()->back();      
  }
  public function createTeam(Request $request)
  {
    $data = $request->validate([
      'name' => 'required',
    ]);
    $id = Auth::user()->id;
    $data['user_id'] = $id;
    $data['role'] = 'captain';
    $data['link'] =  base64_encode( Str::random(32));
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
         return redirect()->back();   
    } else {
      \Session::flash('flash_meassage_error', 'У вас уже есть команда');
        return redirect()->back();   
    }
  }
  public function deleteProfile($id)
  {
     $has_team = DB::table('team')->where('user_id', $id)->exists();
    if($has_team == true){
      $team_id = Team::getTeamId($id);
      \Session::flash('flash_meassage_error', 'Перед тем как удалить профиль, выберите нового тимлида или удалите команду');
      return redirect(route('team', [$team_id, $id]));
    }
    else{
	$user = User::findorfail($id);
    session()->getHandler()->destroy($user->session_id);	
    UsersProfile::delete_profile($id);
    return redirect('login');
    }
  }
  public function query($id, Request $request){
    $data = $request->validate([
      'text' => 'required',
    ]);
 
    $data['user_id'] = $id;
    $data['status'] = 0;

    UsersProfile::queryUpdate($data);
    \Session::flash('flash_meassage', 'Ваш запрос отправлен');
     return redirect()->back();
  } 
  public function changePassword(Request $request){
    $validator = Validator::make($request->all(), [
      'oldpassword' => ['required'],
     
      'password' => ['required','confirmed'],
     
  ]);

  if ($validator->fails()) {
    return response()->json(['error'=>$validator->errors()->all()]);
      
  }else{ 
   
     $password = Hash::make($request->input('password'));
     User::changePassword(Auth::user()->id, $password);
     return response()->json(['success'=>'Пароль успешно изменен']);
    
  }
}
protected function validator(array $data)
{
    return Validator::make($data, [
        'oldpassword' => ['required'],   
        'newpassword' => ['required','confirmed'],
    ]);
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
