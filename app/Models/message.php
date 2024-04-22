<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;
    protected $fillable=[
        'ticket_id',
        'masseges'
    ];
    public function ticket(){
        return $this->hasMany(task::class);
    }
}
