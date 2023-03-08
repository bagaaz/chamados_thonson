<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes, HasTimestamps;

    protected $fillable = [
        'message',
        'call_id',
        'user_id'
    ];

    public function caller()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
