<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['year', 'title', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
