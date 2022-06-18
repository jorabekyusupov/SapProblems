<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
   protected $table = 'problems';
    protected $fillable = [
        'kod',
        'problem',
        'solution',
        'start_date',
        'end_date',
        'user_id',
        'is_active',
        'status',
        'like',
        'dislike',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
