<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'country',
        'session_id',
        'two_factor_code',
        'two_factor_expires_at',
        'phone' ,
        'fio' ,
        'timezone' ,
        'city' ,
        'bdate' ,
        'nickname' ,
        'game_id' ,
        'doc_photo',
        'doc_photo2',
        'verification',
          'exist_status',
          'status',
        'verified',
        'two_factor_code',
        'two_factor_expires_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'two_factor_expires_at' => 'datetime',
    ];
    
    public function logsFull() {
        $logs = $this->logs()->select([  'id', 'log_type', 'description', 'table_name', 'created_at',  'user_id', 'old_value', 'new_value', ])
            ->with(['type', 'user', 'newAdminUser', 'oldAdminUser']);
        $bans = $this->bans()->select(['id', 'log_type', 'description', 'table_name', 'created_at',  'user_id', 'ban_id'   , 'ban_type' , ])->orderBy('created_at', 'desc');
     
        $all = $logs->unionAll($bans)->paginate(10);
     
        return $all;
     }
   public function getip() {
        $ip = $this->user_ip()->select([  'ip', 'created_at']);
        $all = $ip->latest()->paginate(10);
        return $all;
     }

     public function role()
    {
        return $this->hasOne(ModelHasRoles::class, 'model_id', 'id');
    }
    
    public function user_ip()
    {
        return $this->hasOne(Ip_log::class, 'user_id', 'id');
    }

     public function logo(){
        return $this->hasOne(Users_logo::class, 'user_id', 'id');
   }

    public function logs(){
        return $this->morphMany(Log::class,'model');
   }

    public function teamMembers() {
        return $this->hasMany(TeamMembers::class);
    }

    public function team() {
        return $this->hasOne(Team::class);
    }

    public function bans(){
        return $this->morphMany(Report::class,'ban');
    }

    public function verifications(){
        return $this->hasMany(LogVerified::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->token = Str::random(30);
        });
    }

    public function confirmEmail()
    {
        $this->verified = true;
        //$this->token = null;
        $this->save();
    }
    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    } 

    public static function getEmail($id){
        return DB::table('users')->select('email','status')->where('id',$id)->first();
    }
    public static function getUsersStatus($id){
        return DB::table('users')->where('id',$id)->value('status');
    }
    public static function changePassword($id, $password){
        return DB::table('users')->where('id', $id)->update(['password' => $password]);
    }
    public static function test($id, $key){
        return DB::table('users')->where('id', $id)->update(['session_id' => $key]);
    }
    public function generateTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(10);
        $this->save();
    }

    public function resetTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }
}
