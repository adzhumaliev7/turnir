<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = ['ban_type','table_name','ban_id', 'user_id', 'description', 'date', 'log_type'];

    public function ban(){
        return $this->morphTo();
    }

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
