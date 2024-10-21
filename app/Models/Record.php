<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Import SoftDeletes

class Record extends Model
{
    use HasFactory, SoftDeletes; // Add SoftDeletes here

    protected $fillable = [
        'year_id', 'month', 'folder_id', 'folder_type', 'folder_description',
        'submission_year_id', 'submission_month', 'status', 'others', 'remarks',
        'activate', 'exclude' // Add activate and exclude to fillable
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


