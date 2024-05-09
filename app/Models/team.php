<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsToMany(user::class);
    }
    // public function users(){
    //     return $this->hasMany(user::class);
    // }
    public function lable(){
        return $this->morphToMany(lable::class, 'lablebles');
    }
}
