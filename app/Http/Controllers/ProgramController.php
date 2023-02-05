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

    public function index()
    {
        $data = Program::paginate(9);
        return view('app.program.index',['data'=>$data]);
    }

    public function detail(int $program_id)
    {
        if (Program::where('id',$program_id)->exists()) {
            $data = Program::where('id',$program_id)->with('programCategory')->first();
            return view('app.program.detail',['data'=>$data]);
        }
    }
}
