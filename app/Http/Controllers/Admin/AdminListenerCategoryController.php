<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ListenerCategory;

class AdminListenerCategoryController extends Controller
{
    private $model=null;

    public function __construct()
    {
        $this->model = new ListenerCategory;
    }

    public function index() 
    {
        return view('admin.program.listener-category.index', ['data' => $this->model->with('programs')->paginate(10)]);
    }

    public function create()
    {
        return view('admin.program.listener-category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        $stored = $this->model->create($validated);
        if ($stored){
            return redirect()->route('admin-listenercategories-index')->with('success','Категория студентов создана');
        }
    }

    public function edit($id)
    {
        $item=$this->model->where('id',$id)->first();
        return view('admin.program.listener-category.edit',['data' => $item]);
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        $item=$this->model->where('id',$validated['id'])->first();
        $item->name = $validated['name'];
        if ($item->save()){
            return redirect()->route('admin-listenercategories-index')->with('success','Категория студентов создана');
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
        return redirect()->route('admin-educationforms-index')->with('success','Форма обучения удалена');
    }
}