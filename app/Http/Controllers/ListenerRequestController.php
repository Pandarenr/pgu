<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as Subscribe;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class ListenerRequestController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasPermissionTo('listener-request-edit')){
            return view('admin.request.index',['data'=>]);
        }if(Auth::user()->hasPermissionTo('listener-own-request-edit')){

        }
        $data = Subscribe::with('course')->paginate(8);

        return view('admin.request.index',['data'=>$data]);
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