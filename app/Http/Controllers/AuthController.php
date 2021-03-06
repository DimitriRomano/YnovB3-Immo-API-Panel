<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller

{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|min:10|max:16|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $image = $request->file('image');
        if($image){
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
            $imagePath = '/img/' . $imageName;
        }else{
            $imagePath = 'img/user.jpg';
        }

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone= $validatedData['phone'];
        $user->password = Hash::make($validatedData['password']);
        $user->image = $imagePath;
        $user->role_id = 2;
        $user->save();


        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer',
        ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json([
        'message' => 'Invalid login details'
                ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
        ]);
    }

    public function me(Request $request)
    {
        return $request->user();
    }

    public function findAll(Request $request)
    {
        $users = User::all();
        return view('dashboard.users', compact('users'));
    }

    public function logout()
    {
        Auth::user()->tokens()->where('id', Auth::id())->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function update(Request $request)
    {
        $user_id = Auth::id();
        $user = User::find($user_id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|min:10|max:16|unique:users',
            'password' => 'required|string|min:6'
        ]);


        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
            $imagePath = '/img/' . $imageName;
            $user->image = $imagePath;
        }

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone= $validatedData['phone'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return response()->json([
            'message' => 'Successfully updated'
        ]);
    }

    public function admin_update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone= "0".$request->phone;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->role_id = $request->role_id;
        $user->save();


        return redirect()->route('admin.users');
    }

    public function admin_delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/users');
    }
}
