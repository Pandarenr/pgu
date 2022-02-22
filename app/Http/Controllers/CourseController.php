<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\ListenerRequest;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class CourseController extends Controller
{
    private $listenerRequest=null;

    public function __construct(){
        $this->listenerRequest=new ListenerRequest;
    }

    public function main()
    {
        $data = Course::with('subject')->paginate(8);

        return view('courses.card',['data'=>$data]);
    }

    // public function createRequest($id)
    // {
    //     $data=Auth::user();

    //     if (Subscribe::where('user_id', $data->id)->first() && Subscribe::where('course_id', $id)->first()){
    //         return redirect()->back()->with('error', 'Вы уже подали заявку на курс ');
    //     }

    //     $request = Subscribe::create([
    //         'name' => $data->name,
    //         'second_name' => $data->second_name,
    //         'email' => $data->email,
    //         'phone' => $data->phone,
    //         'age' => $data->age,
    //         'user_id' => $data->id,
    //         'course_id' => $id,
    //     ]);

    //     return redirect()->back()->with('success', 'Вы подали заявку на курс ');
    // }

    public function allCourses()
    {
        $data = Course::with('subject')->paginate(8);

        return view('courses.index',['data'=>$data]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ownCourses()
    {
        $data = Course::where('creator_id',Auth::user()->id)->with('subject')->paginate(5);
        return view('courses.index',['data'=>$data]);
    }

    /**
     * @param int|null $id
     * @return View|RedirectResponse
     */
    public function showEditForm(int $id = null): View|RedirectResponse
    {
        $subjects=DB::table('subjects')->get();
        $course=null;
        if ($id) {
            $course=Course::with('subject')->findOrFail($id);
            if (!$course instanceof Course) {
                return back()->withErrors('Ошибка... Курс не найден');
            }
        }

        return view('courses.edit',['course'=>$course,'subjects'=>$subjects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'subject_id' => ['required'],
            'form' => ['required','string'],
            'duration' => ['required','string'],
            'kategory' => ['required','string'],
        ]);

        $course = Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'subject_id' => $request->subject_id,
            'form' => $request->form,
            'duration' => $request->duration,
            'kategory' => $request->kategory,
            'creator_id' => Auth::user()->id,
        ]);
        if($course){
            return redirect()->route('user-courses-list',Auth::user()->id)->with('success','Курс создан');
            //return dd($course);
        }

        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailCourse($course_id)
    {
        $canSubscribe=false;
        if (Auth::user()){
            if ($this->listenerRequest->exist($course_id)){
                $canSubscribe=true;
            }
        }

        if (Course::where('id',$course_id)->exists()) {
            $data = Course::where('id',$course_id)->with('subject')->first();
            return view('courses.detail',['data'=>$data,'canSubscribe'=>$canSubscribe]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
