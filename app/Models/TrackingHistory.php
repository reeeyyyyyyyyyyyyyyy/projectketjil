<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_id',
        'process_step_id',
        'status',
        'notes',
        'officer_id',
        'started_at',
        'completed_at',
    ];

    protected $dates = [
        'started_at',
        'completed_at',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function processStep()
    {
        return $this->belongsTo(ProcessStep::class);
    }

    public function officer()
    {
        return $this->belongsTo(User::class, 'officer_id');
    }
}
