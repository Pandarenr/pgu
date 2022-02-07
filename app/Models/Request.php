<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'second_name',
        'email',
        'phone',
        'age',
        'course_id',
        'user_id',
    ];
}
