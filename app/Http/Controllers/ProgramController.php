<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\View\View;
use App\Models\Program;

class ProgramController extends Controller
{
    private $model = null;

    public function __construct(){
        $this->model = new Program;
    }

    public function index()
    {
        return view('app.program.index', ['data' => $this->model->paginate(9)]);
    }

    public function detail(int $id)
    {
        $validator = Validator::make(['id' => $id], ['id' => 'required|numeric']);
        $validated = $validator->validated();
        if ($this->model->where('id', $validated['id'])->exists()) {
            return view(
                'app.program.detail',
                ['data' => $this->model->where('id', $validated['id'])->with('programCategory', 'listenerCategory', 'educationForm')->first(),]
            );
        }
    }
}