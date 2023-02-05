<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Review extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'text',
        'rating',
        'moderated'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getNormalReview(){}

    public function getRelative(){
        $data=Model::where('moderated',1)->with('user')->get();
        if(count($data) == 0){
            return null;
        }elseif(count($data)<=3){
            return $data;
        }
        return $data->random(3);
    }

    public function list(){
        $data=Model::where('user_id',Auth::user()->id)->paginate(10);
        return $data;
    }

    public function haveReview(){
        return Model::where('user_id',Auth::user()->id)->first()?true:false;
    }
}
