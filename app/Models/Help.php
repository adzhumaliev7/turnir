<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Help extends Model
{
    use HasFactory;
    protected $table = 'help';
    protected $fillable = [ 'title', 'text', 'user_id',  'post_id'];

    public function admin(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }


    public static function getAll()
    {
          $posts = DB::table('help')->leftJoin('users' , 'help.user_id', '=', 'users.id')->select('help.*', 'users.name')->orderBy('post_id', 'asc')->get();
          return $posts->count() ? $posts : null;
    }
}
