<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['title', 'image', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

