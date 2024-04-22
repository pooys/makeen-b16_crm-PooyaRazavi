<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'codemeli',
        'mobile',
        'tarikht_tavalod',
        'sex',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function orders(){
        return $this->hasMany(order::class);
    }
    public function team(){
        return $this->belongsTo(team::class);
    }
    public function resseler(){
        return $this->hasOne(resseler::class);
    }
    public function task(){
        return $this->belongsTo(task::class);
    }
    public function note(){
        return $this->belongsTo(note::class);
    }
    public function ticket(){
        return $this->belongsTo(task::class);
    }
    public function lables(){
        return $this->belongsToMany(lable::class);
    }
}
