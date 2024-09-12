<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        return $this->belongsTo(user::class);
    }
    public function massege():BelongsTo
    {
        return $this->belongsTo(message::class);
    }

}
