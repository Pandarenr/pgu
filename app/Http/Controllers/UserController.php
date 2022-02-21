<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User as User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Hash;
use Auth;

class UserController extends Controller
{
    /**
     * Display a profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile ()
    {
        return view('profile.index',[
            'data'=>User::where('id',Auth::user()->id)->first()
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        return view('profile.edit',['data'=>Auth::user()]);
    }

    public function editPass()
    {
        //
        return view('profile.edit-pass');
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
            'name' => ['required', 'string', 'max:40'],
            'second_name' => ['required', 'string', 'max:40'],
            'patronymic' => ['required', 'string', 'max:40'],
            'gender' => ['required','string'],
            'phone' => ['required', 'max:10','string'],
            'age' => ['required', 'max:10','string'],
            'email' => ['required', 'string', 'email', 'max:80', 'unique:users']
        ]);
        //return dd($val);
        $user=User::findOrFail(Auth::user()->id);
        $data=[
            'name' => $request->name,
            'second_name' => $request->second_name,
            'patronymic' => $request->patronymic,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age
        ];

        // if (!$user->save($data)){
        //     return redirect(url('/profile'))->with('error','Ошибка изменения'.$user);
        // };
        $user->update($data);
        //return dd($user);
        return redirect(url('/profile'))->with('success','Профиль успешно изменён'.$user);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
