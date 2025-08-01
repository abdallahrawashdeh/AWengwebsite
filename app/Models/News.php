<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Factories\HasFactory;



class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'content', 'image', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


