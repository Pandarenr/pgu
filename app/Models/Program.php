<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'duration',
        'cost',
        'main_image',
        'listener_category_id',
        'education_form_id',
        'program_category_id',
    ];

    public function programCategory()
    {
        return $this->belongsTo(\App\Models\ProgramCategory::class, 'program_category_id');
    }

    public function educationForm()
    {
        return $this->belongsTo(\App\Models\EducationForm::class, 'education_form_id');
    }

    public function listenerCategory()
    {
        return $this->belongsTo(\App\Models\ListenerCategory::class, 'listener_category_id');
    }
}