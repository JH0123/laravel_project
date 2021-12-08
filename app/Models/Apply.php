<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Apply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
    ];
    public function apply()
    {
        // post_id - user (1:n)
        return $this->belongsTo(Post::class, "user_id");
    }
}
