<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $table = 'listeners_requests';

    public function course() {
        return $this->belongsTo(\App\Models\Course::class, 'course_id');
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function ownData() {
        $data=$this->where('user_id',Auth::user()->id)->get();
        return $data;
    }

    public function adminData() {
        $data=$this->get();
        return $data;
    }

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
