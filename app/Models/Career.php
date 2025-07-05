<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'subtitle', 'years_experience', 'content', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

