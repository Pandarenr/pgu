<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProgramCategory;

class AdminProgramCategoryController extends Controller
{
    private $model=null;

    public function __construct()
    {
        $this->model = new ProgramCategory;
    }

    public function index() 
    {
        return view('admin.program.program-category.index', ['data' => $this->model->with('programs')->paginate(10)]);
    }

    public function create()
    {
        return view('admin.program.program-category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|max:255']);
        $stored = $this->model->create($validated);
        if ($stored){
            return redirect()->route('admin-programcategories-index')->with('success', 'Категория программ создана');
        }
    }

    public function edit($id)
    {
        $item=$this->model->where('id',$id)->first();
        return view('admin.program.program-category.edit',['data' => $item]);
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'id' => 'required|int',
        ]);
        $item=$this->model->where('id',$validated['id'])->first();
        $item->name = $validated['name'];
        if ($item->save()){
            return redirect()->route('admin-programcategories-index')->with('success','Категория программ создана');
        }
    }
    
    public function delete(Request $request)
    {   
        $validated = $request->validate(['id' => 'int']);
        $item = $this->model->where('id', $validated['id'])->first();
        if($item){
            $item->programs()->delete();
            $item->delete();
        }
        return redirect()->route('admin-programcategories-index')->with('success','Категория программ удалена');
    }
}
