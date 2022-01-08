<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersProfile;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
  public function index()
  {
    $id = Auth::user()->id;
    $data = UsersProfile::getById($id);
    $timezones = config('app.timezones');
    $teams = Team::getTeamById($id);
    $verification_status = UsersProfile::checkVerification($id);
    $tournaments = UsersProfile::getTeamById($id);

    return view('profile', [
      'data' => $data,
      'teams' => $teams,
      'user_id' => $id,
      'tournaments' => $tournaments,
      'verification_status' => $verification_status,
      'timezones' => $timezones
    ]);
  }

  public function saveProfile(Request $request)
  {

    if ($request->isMethod('post')) {

      if ($request->hasFile('doc_photo')) {
        $file_name = $request->file('doc_photo')->getClientOriginalName();
        $file = $request->file('doc_photo');
        $file->move(public_path() . '/uploads/storage/img', $file_name);
      }
      if ($request->hasFile('doc_photo2')) {
        $file_name2 = $request->file('doc_photo2')->getClientOriginalName();
        $file = $request->file('doc_photo2');
        $file->move(public_path() . '/uploads/storage/img', $file_name2);
      }

      $data = $request->validate([
        'doc_photo' => '',
        'doc_photo2' => '',
        'phone' => 'required',
        'fio' => 'required',
        'login' => 'required',
        'email' => 'required|email',
        'country' => '',
        'timezone' => '',
        'city' => '',
        'bdate' => '',
        'nickname' => 'required',
        'game_id' => 'required'
      ]);
      $id = Auth::user()->id;
      $data['verification'] = 'on_check';
      $data['user_id'] = $id;
      $data['doc_photo'] = $file_name;
      $data['doc_photo2'] = $file_name2;
      try {
        UsersProfile::saveProfile($data);
      } catch (\Illuminate\Database\QueryException  $exception) {
        return back()->withError('Email ' . $request->input('email') . ' уже занят')->withInput();
      }
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
  public function getTournaments($id)
  {
    
  }
}
