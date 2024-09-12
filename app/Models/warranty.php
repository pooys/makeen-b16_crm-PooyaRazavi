<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warranty extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'started_at',
        'ended_at',
        'product_id'
    ];
    public function product(){
        return $this->belongsTo(product::class);
    }
}
