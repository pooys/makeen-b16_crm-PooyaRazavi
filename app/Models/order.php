<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'namte',
        'brand',
        'user_id',
        'model',
        'price',

    ];
    public function user(){
        return $this->belongsTo(user::class);
    }
    public function products():BelongsToMany
    {
        return $this->belongsToMany(product::class);
    }
    public function factor()
    {
        return $this->hasOne(factor::class);
    }

}
