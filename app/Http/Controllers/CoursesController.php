<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course as Course;
use Auth;

class CoursesController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
    public function allData()
    {
        $data = Course::with('subject')->paginate(8);

        return view('courses',['data'=>$data]);
    }

    public function detailCourse($course_id)
    {

        if (Course::where('id',$course_id)->exists()) {
            $course = Course::where('id',$course_id)->with('subject')->first();
            return view('course',['data'=>$course]);
        }

    }

    public function index($user_id) {
        if ( Auth::user()->id == $user_id ) {
            $data = Course::where('creator_id',$user_id)->with('subject')->paginate(5);
            return view('profile.courses.index',['data'=>$data,'user_id'=>$user_id]);
            //return dd($data);
        }else{
            return abort(404);
        }
    }


    public function create()
    {
        $number=count(Course::where('creator_id',Auth::user()->id)->get());
        if ($number < 5){
            $data=DB::table('subjects')->get();
            return view('profile.courses.create',['data'=>$data]);
        }else{
            return abort(404);
        }

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:400'],
            'subject_id' => ['required'],
        ]);

        $course = Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'subject_id' => $request->subject_id,
            'creator_id' => Auth::user()->id,
        ]);
        if($course){
            return redirect()->route('profile-courses',Auth::user()->id)->with('success','Курс создан');
            //return dd($course);
        }

        return abort(404);
    }
}