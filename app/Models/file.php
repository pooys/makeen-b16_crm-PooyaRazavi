<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    use HasFactory;
    protected $fillable = [
        'media_name',
        'size',
        'path',
        'type',
        'ext',
    ];
    public  function users()
    {
        return $this->morphedByMany(User::class,'mediables');
    }
    public function message()
    {
        return $this->morphedByMany(message::class,'mediables');
    }
}
