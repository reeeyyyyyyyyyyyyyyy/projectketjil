<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_type_id',
        'step_name',
        'department',
        'sequence',
        'estimated_duration',
    ];

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function trackingHistories()
    {
        return $this->hasMany(TrackingHistory::class);
    }
}
