<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_date',
        'total_submissions',
        'completed',
        'in_progress',
        'delayed',
        'avg_processing_time',
    ];

    protected $dates = ['report_date'];
}
