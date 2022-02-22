<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;

class ListenerRequest extends Model
{
    use HasFactory;

    protected $table = 'listeners_requests';
    protected $fillable=[
        'new',
        'course_id',
        'user_id',
        'documents'
    ];

    public function course() {
        return $this->belongsTo(\App\Models\Course::class, 'course_id');
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function list() {
        if(Auth::user()->hasRole('admin')){
            $data=$this->with('course','user')->get();
            foreach ($data as $el){
                $el->created_at=$el->created_at->format('d.m.Y');
            }
            return $data;
        }else{
            $data=$this->with('course','user')->where('user_id',Auth::user()->id)->get();
            return $data;
        }
        return abort(403,'Нет прав доступа');
    }


    public function checkFirstLook($listenerRequestId){
        $data=$this->where('id',$listenerRequestId)->first();
        if ($data->new == 1){
            $data->update(['new' => 0]);
        }
        return null;
    }

    public function store($request) {
        $data=[
            'new'=>1,
            'user_id'=>Auth::user()->id,
            'course_id'=>$request->course_id,
            'documents'=>'something',
        ];
        // $this->new=1;
        // $this->user_id=Auth::user()->id;
        // $this->course_id=$request->course_id;
        // $this->documents='something';
        $result=($this->create($data) ? true : false);
        return $result;
    }

    public function exist(int $course_id) {
        $result=($this->where([
                ['user_id', Auth::user()->id],
                ['course_id', $course_id]
            ])->first() ? true : false);
        return $result;
    }

    public function convertCreateDate(int $date,string $format) {
        $convertedDate=$date->format($format);
    }
}
