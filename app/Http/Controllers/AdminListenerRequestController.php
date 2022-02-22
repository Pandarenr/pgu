<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListenerRequest;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class AdminListenerRequestController extends ListenerRequestController
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

    public function show($listenerRequestId)
    {
        $this->listenerRequest->checkFirstLook($listenerRequestId);
        return redirect()->route('listeners-requests')->with('success', '+');
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