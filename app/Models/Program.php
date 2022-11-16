<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public function programCategory() {
        return $this->belongsTo(\App\Models\ProgramCategory::class, 'program_category_id');
    }

    protected $fillable = [
        'name',
        'description',
        'education_form',
        'duration',
        'listener_category',
        'image_id',
        'program_category_id',
        'creator_id',
    ];
}
