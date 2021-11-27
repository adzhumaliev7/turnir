<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersProfile extends Model
{
    public function saveProfile($data){
       return DB::table('users_profile2')->insert($data);
    }

     public function getById($id){
       $is_has = DB::table('users_profile2')->where('user_id', $id)->exists();
       if($is_has == true){
         return DB::table('users_profile2')->where('user_id', $id)->get();
       }
       else {
          return NULL;
       }
     
   }
}
