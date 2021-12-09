<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $fillable = [
        'member',
        'club_id',
    ];
    public function apply()
    {
        // club_id - user (1:n)
        return $this->belongsTo(Apply::class, "member");
    }
}
