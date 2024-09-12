<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'team_id',
        'title',
        'description'
    ];
    public function user(){
        return $this->belongsTo(user::class);
    }
}
