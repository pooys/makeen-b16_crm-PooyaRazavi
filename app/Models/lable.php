<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lable extends Model

{
    protected $fillable=[
        'title'
    ];
    use HasFactory;
    public function users(){
        return $this->morphToMany(User::class,'lablebles');
    }

    public function teams(){
        return $this->morphToMany(team::class, 'lablebles');
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
