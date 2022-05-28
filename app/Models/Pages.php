<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Pages extends Model
{
    use HasFactory;

    protected $table = 'pages';
      protected $fillable = [ 'page','text' ,'title'];


    public static function getAll()
    {
          $pages = DB::table('pages')->get();
          return $pages->count() ? $pages : null;
    }
}
