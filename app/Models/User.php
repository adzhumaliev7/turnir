<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
    ];

   

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
        $this->token = null;
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
   /*  public function generateTwoFactorCode()
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
    } */
}
