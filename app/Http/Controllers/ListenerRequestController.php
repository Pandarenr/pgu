<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Models\ListenerRequest;
use App\Models\User;
use App\Models\Program;
use Auth;

class ListenerRequestController extends Controller
{
    private $listenerRequest = null;
    private $program = null;

    public function __construct(){
        $this->listenerRequest = new ListenerRequest();
        $this->program = new Program();
    }

    public function index(){
        return view('listener-request.index',['data'=>$this->listenerRequest->list()]);
    }

    public function showCreateForm($program_id){
        $data=$this->program->where('id',$program_id)->first();
        return view('listener-request.create',['data'=>$data]);
    }

    public function store(Request $request){
        if ($this->listenerRequest->exist($request->program_id)){
            return redirect()->route('detail-program',$request->program_id)->with('error', 'Вы уже подали заявку на программу');
        }if ($this->listenerRequest->store($request)){
            return redirect()->route('detail-program',$request->program_id)->with('success', 'Вы подали заявку на программу');
        }
        return redirect()->route('detail-program',$request->program_id)->with('error', 'Не получилось создать заявку');
    }

    public function detail($request_id){
        if (Subscribe::where('id',$request_id)->exists()) {
            $data = Subscribe::with('course')->where('id',$request_id)->first();
            $userData = User::where('id',$data->user_id)->first();
            return view('admin.request.detail',['data'=>$data,'userData'=>$userData]);
        }
    }

    public function delete(Request $request){
        if (!$request->get('id')) {
            return back()->withErrors('Ошибка сервера... Попробуйте снова.');
        }

        $id = (int)$request->get('id');

        $subscribe = Subscribe::findOrFail($id);

        if (!$subscribe instanceof Subscribe) {
            return back()->withErrors('Ошибка сервера... заявка не найдена');
        }
        $subscribe->delete();

        return redirect('/profile/requests')->with('success', 'Заявка ' . $subscribe->id . ' удалена!');
    }
}