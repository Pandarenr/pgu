<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function programs()
    {
        return $this->hasMany('App\Models\Program', 'program_category_id');
    }
}
