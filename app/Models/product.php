<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_product',
        'brand',
        ',model',
        'price',
    ];
    public function orders():BelongsToMany
    {
        return $this->belongsToMany(order::class);
    }
    public function warranty(){
        return $this->hasMany(warranty::class);
    }
    public function lables(){
        return $this->belongsToMany(lable::class);
    }
}
