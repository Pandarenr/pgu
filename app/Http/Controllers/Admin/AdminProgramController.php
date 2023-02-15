<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgramRequest;
use App\Models\Program;

class AdminProgramController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Program;
    }

    public function index()
    {
        $data = $this->model->with('programCategory', 'listenerCategory', 'educationForm')->paginate(10);
        return view('admin.program.index',['data' => $data]);
    }

    public function create()
    {
        return view(
            'admin.program.create',
            [
                'programCategories' => DB::table('program_categories')->get(),
                'listenerCategories' => DB::table('listener_categories')->get(),
                'educationForms' => DB::table('education_forms')->get(),
            ]
        );
    }

    public function store(StoreProgramRequest $request)
    {
        $validated=$request->validated();
        $create = $this->model->create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'duration' => $validated['duration'],
            'cost' => $validated['cost'],
            'listener_category_id' => $validated['listener_category_id'],
            'program_category_id' => $validated['program_category_id'],
            'education_form_id' => $validated['education_form_id'],
        ]);
        if($create){
            return redirect()->route('admin-programs-index')->with('success','Программа создана');
        }
        return abort(404);
    }

    public function edit($id)
    {
        return view(
            'admin.program.edit',
            [
                'data' => $this->model->where('id',$id)->first(),
                'programCategories' => DB::table('program_categories')->get(),
                'listenerCategories' => DB::table('listener_categories')->get(),
                'educationForms' => DB::table('education_forms')->get(),
            ]
        );
    }

    public function save(StoreProgramRequest $request)
    {
        $validated = $request->validated();
        $save = $this->model->save([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'duration' => $validated['duration'],
            'cost' => $validated['cost'],
            'listener_category_id' => $validated['listener_category_id'],
            'program_category_id' => $validated['program_category_id'],
            'education_form_id' => $validated['education_form_id'],
        ]);
        if($save){
            return redirect()->route('admin-programs-index')->with('success','Программа изменена');
        }
        return abort(404);
    }

    public function delete(Request $request)
    {
        $validated = $request->validate(['id' => 'int']);
        $item = $this->model->where('id', $validated['id'])->first();
        if($item){
            $item->delete();
        }
        return redirect()->route('admin-programs-index')->with('success','Программа удалена');
    }
}