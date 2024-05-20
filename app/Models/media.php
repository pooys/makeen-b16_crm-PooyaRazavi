<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class media extends Model
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
}
