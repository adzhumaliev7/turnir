<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Feedback extends Model
{
    public function saveFeedback($data){
        return DB::table('feedback')->insert($data);
    }
}
