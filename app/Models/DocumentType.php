<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'processing_days',
        'requirements',
    ];

    protected $casts = [
        'requirements' => 'array',
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function processSteps()
    {
        return $this->hasMany(ProcessStep::class);
    }
}
