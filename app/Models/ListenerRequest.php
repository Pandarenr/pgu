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
        'program_id',
        'user_id',
        'documents'
    ];

    public function program() {
        return $this->belongsTo(\App\Models\Program::class, 'program_id');
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function list() {
        if(Auth::user()->hasRole('admin')){
            $data=$this->with('program','user')->get();
            return $data;
        }else{
            $data=$this->with('program')->where('user_id',Auth::user()->id)->get();
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
            'program_id'=>$request->program_id,
            'documents'=>'something',
        ];
        $result=($this->create($data) ? true : false);
        return $result;
    }

    public function validate($request) {

    }

    public function exist(int $program_id) {
        if(!Auth::check()){
            return false;
        }
        $result=($this->where([
                ['user_id', Auth::user()->id],
                ['program_id', $program_id]
            ])->first() ? true : false);
        return $result;
    }
}
