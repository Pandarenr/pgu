<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EducationForm;

class AdminEducationFormController extends Controller
{
    protected $model=null;

    public function __construct()
    {
        $this->model = new EducationForm;
    }

    public function index()
    {
        return view(
            'admin.program.education-form.index',
            ['data' => $this->model->with('programs')->paginate(10),]
        );
    }

    public function create()
    {
        return view('admin.program.education-form.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate(
            ['name' => 'required|max:255']
        );
        $stored = $this->model->create(
            ['name' => $validated['name']]
        );
        if ($stored){
            return redirect()->route('admin-educationforms-index')->with('success', 'Форма обучения создана');
        }
    }

    public function edit($modelId)
    {
        return view('admin.program.education-form.edit',['data' => $this->model->where('id', $modelId)->first()]);
    }

    public function save(Request $request)
    {
        $validated = $request->validate(['name' => 'required|max:255']);
        $item = $this->model->where('id', $request->id)->first();
        $item->name = $validated['name'];
        if ($item->save()){
            return redirect()->route('admin-educationforms-index')->with('success', 'Форма обучения изменена');
        }
    }
    
    public function delete($modelId)
    {
        $item = $this->model->where('id', $modelId)->first();
        if($item){
            $item->programs()->delete();
            $item->delete();
        }
        return redirect()->route('admin-educationforms-index')->with('success', 'Форма обучения удалена');
    }
}
