<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('app.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:40'],
            'second_name' => ['required', 'string', 'max:40'],
            'patronymic' => ['required', 'string', 'max:40'],
            'gender' => ['required','string'],
            'phone' => ['required', 'max:10','string'],
            'age' => ['required', 'max:10','string'],
            'email' => ['required', 'string', 'email', 'max:80', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'second_name' => $request->second_name,
            'patronymic' => $request->patronymic,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'age' => $request->age,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role=Role::findByName('user');
        $user->assignRole([$role->id]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
