<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Models\ListenerRequest;
use App\Models\Program;
use Auth;

class ProgramController extends Controller
{
    private $listenerRequest=null;

    public function __construct(){
        $this->listenerRequest=new ListenerRequest;
    }

    public function index()
    {
        $data = Program::paginate(8);
        return view('app.programs',['data'=>$data]);
    }

    public function detail(int $program_id)
    {
        $canSubscribe=false;
        if ($this->listenerRequest->exist($program_id)){
            $canSubscribe=true;
        }
        if (Program::where('id',$program_id)->exists()) {
            $data = Program::where('id',$program_id)->with('programCategory')->first();
            return view('app.program-detail',['data'=>$data,'canSubscribe'=>$canSubscribe]);
        }
    }
}
