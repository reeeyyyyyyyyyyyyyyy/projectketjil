<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'department',
        'position',
        'phone_extension',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
