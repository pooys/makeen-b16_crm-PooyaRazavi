<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'subject',
        'supporter',
        'message',
        'started_at',
        'ended_at'
    ];
    public function user(){
        return $this->hasmany(user::class);
    }
    public function masseges(){
        return $this->belongsTo(task::class);
    }
}
