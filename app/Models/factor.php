<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factor extends Model
{
    use HasFactory;
    protected $fillable=[
        'number_factor',
        'order_id'
    ];
    public function order(){
        return $this->hasOne(order::class);
    }

}
