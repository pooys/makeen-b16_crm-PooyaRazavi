<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class message extends Model
{
    use HasFactory;
    protected $fillable=[
        'ticket_id',
        'masseges'
    ];
    public function ticket():HasMany
    {

        return $this->hasMany(ticket::class);
    }
}
