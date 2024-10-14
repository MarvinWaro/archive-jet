<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'year_id', 'month', 'folder_id', 'folder_type', 'folder_description',
        'submission_year_id', 'submission_month', 'status', 'others', 'remarks'
    ];

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function submissionYear()
    {
        return $this->belongsTo(SubmissionYear::class);
    }

    public function folder()
    {
        return $this->belongsTo(Folder::class, 'folder_id', 'id');
    }
}

