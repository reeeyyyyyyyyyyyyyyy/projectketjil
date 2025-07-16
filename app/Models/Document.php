<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_number',
        'document_type_id',
        'user_id',
        'applicant_name',
        'applicant_phone',
        'applicant_email',
        'business_address',
        'status',
        'submission_date',
        'completion_date',
        'notes',
    ];

    protected $dates = [
        'submission_date',
        'completion_date',
    ];

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class, 'document_type_id');
    }

    public function applicant()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function trackingHistories()
    {
        return $this->hasMany(TrackingHistory::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
