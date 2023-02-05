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

    public function educatiionForm()
    {
        return $this->belongsTo(\App\Models\EducationForm::class, 'education_form_id');
    }

    public function listenerCategory()
    {
        return $this->belongTo(\App\Models\ListenerCategory::class, 'listenr_category_id');
    }

    protected $fillable = [
        'name',
        'description',
        'education_form_id',
        'duration',
        'listener_category_id',
        'main_image',
        'program_category_id',
    ];
}
