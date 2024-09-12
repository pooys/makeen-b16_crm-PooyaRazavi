<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lable extends Model

{
    protected $fillable=[
        'title',
        'description'
    ];
    use HasFactory;
    public function users(){
        return $this->morphedByMany(User::class,'lablebles');
    }

    public function teams(){
        return $this->morphedByMany(team::class, 'lablebles');
    }
    public function products(){
        return $this->morphedByMany(product::class , 'lablables');
    }
}
