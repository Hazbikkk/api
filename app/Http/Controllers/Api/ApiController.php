<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\StoreLoginRequest;
use App\Models\Register;
use App\Models\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function register()
    {
        return view('api.register');
    }

    public function storeRegister(StoreRegisterRequest $request)
    {
        $user = $request->validated();
        Register::create([
        'name' => $user['name'],
        'email' => $user['email'],
        'password' => Hash::make($user['password'])
        ]); // ← Bcrypt!);
        return redirect()->route('api.login');
    }

    public function login()
    {
        return view('api.login');
    }

public function storeLogin(StoreLoginRequest $request)
{
    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
        return response()->json([
            'message' => 'Неверный email или пароль.'
        ], 401);
    }

    $user = Auth::user(); // ← Уже залогинен!
    $token = $user->createToken('API Token')->plainTextToken;

    $request->session()->put('user', 
        [
            'name' => $user->name,
            'email' => $user->email,
            'token' => $token,
        ]
    );
    $user_session = $request->session()->get('user');

    return view('api.token', ['user' => $user_session]);;
}

    public function token(StoreLoginRequest $request)
    {

        $user = $request->session()->get('user');

        return view('api.token', ['user' => $user]);
    }
}
