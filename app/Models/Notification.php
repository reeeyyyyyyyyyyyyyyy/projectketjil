<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_id',
        'type',
        'message',
        'recipient',
        'sent_at',
        'is_delivered',
    ];

    protected $dates = ['sent_at'];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
