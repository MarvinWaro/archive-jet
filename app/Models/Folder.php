<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'activate', 'exclude'];

    public function products(){
        return $this->hasMany(Record::class, 'folder_id', 'id');
    }
}

