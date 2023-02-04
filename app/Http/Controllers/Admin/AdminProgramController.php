<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Http\Requests\StoreProgramRequest;

class AdminProgramController extends Controller
{
    private $program;

    public function __construct(){
        $this->program = new Program;
    }

    public function index() {
        $programs = $this->program->with('programCategory')->paginate(10);
        return view('admin.program.index',['programs' => $programs]);
    }

    public function create()
    {
        $categories=DB::table('program_categories')->get();
        return view('admin.program.create',['categories'=>$categories]);
    }

    public function edit()
    {
        $categories=DB::table('program_categories')->get();
        return view('admin.program.edit',['categories'=>$categories]);
    }

    public function store(StoreProgramRequest $request)
    {
        $request->validated();
        $create = $this->program->create([
            'name' => $request->name,
            'description' => $request->description,
            'program_category_id' => $request->program_category_id,
            'education_form' => $request->education_form,
            'duration' => $request->duration,
            'listener_category' => $request->listener_category,
            'creator_id' => Auth::user()->id,
            'image' => $request->file('image')->store('education-programs/'.$sluggggg.'/face-image'),
        ]);
        if($create){
            return redirect()->route('admin-list-programs')->with('success','Курс создан');
        }
        return abort(404);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'subject_id' => ['required'],
            'form' => ['required','string'],
            'duration' => ['required','string'],
            'kategory' => ['required','string'],
        ]);
        $id = $request->get('id');
        if ($id) {
            $course = Course::findOrFail($id);
            $message = 'Курс ' . $request->name . ' изменён!';
        } else {
            $course = new Course;
            $message = 'Курс ' . $request->name . ' добавлен!';
        }
        $course->name = $request->name;
        $course->description = $request->description;
        $course->subject_id = $request->subject_id;
        $course->form = $request->form;
        $course->duration = $request->duration;
        $course->kategory = $request->kategory;
        $course->creator_id = Auth::user()->id;
        $course->save();
        return redirect(url('profile/courses'))->with('success',$message );
    }

    public function delete(Request $request)
    {
        if (!$request->get('id')) {
            return back()->withErrors('Ошибка сервера... Попробуйте снова.');
        }
        $id = (int)$request->get('id');
        $course = Course::findOrFail($id);
        if (!$course instanceof Course) {
            return back()->withErrors('Ошибка сервера... курс не найден');
        }
        $course->delete();
        return redirect()->back()->with('success', 'Курс ' . $course->name . ' удален!');
    }
}