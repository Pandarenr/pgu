<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function subject() {
        return $this->belongsTo(\App\Models\Subject::class, 'subject_id');
    }

    protected $fillable = [
        'name',
        'description',
        'subject_id',
        'creator_id',
    ];
}
