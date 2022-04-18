<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = ['title', 'text', 'user_id', 'date','label', 'preview' ];


    public function admin(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public static function getAll()
    {
        $posts = DB::table('posts')->leftJoin('users' , 'posts.user_id', '=', 'users.id')->select('posts.*', 'users.name')->orderBy('id','desc')->get();
        return $posts->count() ? $posts : null;
    }
}

