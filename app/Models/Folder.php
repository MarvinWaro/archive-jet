<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Import SoftDeletes

class Folder extends Model
{
    use HasFactory, SoftDeletes; // Add SoftDeletes here

    protected $fillable = ['name', 'activate', 'exclude'];

    public function products()
    {
        return $this->hasMany(Record::class, 'folder_id', 'id');
    }
}
