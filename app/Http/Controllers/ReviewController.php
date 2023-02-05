<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserReview;
use Auth;

class UserReviewController extends Controller
{
    private $userReview;

    public function __construct(){
        $this->userReview=new UserReview;
    }

    public function index(){
        return view('user-review.index',['data'=>$this->userReview->list()]);
    }

    public function showCreateForm(){
        if(!$this->userReview->haveReview()){
            return view('user-review.create');
        }
        return abort('404');
    }

    public function store(Request $request){
        $data=[
            'user_id' => Auth::user()->id,
            'text' => $request->text,
            'rating' => $request->rating,
            'moderate'=>0
        ];
        $createdUserReview=$this->userReview->create($data);
        if($createdUserReview){
            return redirect()->route('detail-user-review',$createdUserReview)->with('success','Отзыв успешно отправлен');
        }
        return back()->with('error','Отзыв не был отправлен');
    }

    public function detail(int $id){
        $data=$this->userReview->with('user')->find($id);
        //return dd($data);
        return view('user-review.detail',['data'=>$data]);
    }

    public function showEditForm(){}
    public function save(){}
    public function delete(){}
}
