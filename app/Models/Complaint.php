<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'sender_name',
        'sender_phone',
        'sender_email',
        'report_date',
        'street',
        'district',
        'city',
        'complaint_type',
        'content',
        'location',
        'expectation',
        'photo_path',
        'video_path',
        'document_path',
        'status',
    ];

    protected $casts = [
        'report_date' => 'date',
    ];
}
