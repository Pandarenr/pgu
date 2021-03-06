<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListenerRequest;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class ListenerRequestController extends Controller
{

    private $listenerRequest = null;
    public function __construct()
    {
        $this->listenerRequest = new ListenerRequest();
    }

    public function index()
    {
        return view('admin.request.index',['data'=>$this->listenerRequest->list()]);
    }

    public function store(Request $request){
        if ($this->listenerRequest->exist($request->course_id)){
            return redirect()->back()->with('error', 'Вы уже подали заявку на программу');
        }if ($this->listenerRequest->store($request)){
            return redirect()->back()->with('success', 'Вы подали заявку на программу');
        }
        return redirect()->back()->with('error', 'Не получилось создать заявку');
    }

    public function detail($request_id)
    {
        if (Subscribe::where('id',$request_id)->exists()) {
            $data = Subscribe::with('course')->where('id',$request_id)->first();
            $userData = User::where('id',$data->user_id)->first();
            return view('admin.request.detail',['data'=>$data,'userData'=>$userData]);
        }
    }

    public function delete(Request $request)
    {
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