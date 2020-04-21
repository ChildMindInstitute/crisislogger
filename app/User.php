<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Eloquent;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 * @package App
 * @mixin Eloquent
 * @property string $referral_code
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'openhumans_access_token', 'openhumans_refresh_token', 'openhumans_project_member_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function uploads(){
        return $this->hasMany(Upload::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transcriptions(){
        return $this->hasMany(Transcription::class, 'user_id');
    }

    public function texts()
    {
        return $this->hasMany(Texts::class, 'user_id');
    }
    public function questionaires()
    {
        return $this->hasOne(Questionnaire::class, 'user_id');
    }
}
