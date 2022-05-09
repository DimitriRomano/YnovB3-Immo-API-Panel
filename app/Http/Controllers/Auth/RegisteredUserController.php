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

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|min:10|max:16|unique:users',
            'password' => 'required|string|min:6',
        ]);




        $image = $request->file('image');
        if($image){
            $imageName = time() . '.'. $image->getClientOriginalExtension();
            $image->move(public_path('img/user'), $imageName);
            $imagePath = '/img/user/' . $imageName;
        }else{
            $imagePath = '/img/user.jpg';
        }

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone= $validatedData['phone'];
        $user->password = Hash::make($validatedData['password']);
        $user->image = $imagePath;
        $user->role_id = 2;
        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('welcome');
    }
}
