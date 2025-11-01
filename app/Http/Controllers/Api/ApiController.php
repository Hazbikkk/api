<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\StoreLoginRequest;
use App\Models\Register;
use Illuminate\Http\Request;
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
            'name'     => $user['name'],
            'email'    => $user['email'],
            'password' => Hash::make($user['password']),
        ]);

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
            return response()->json(['message' => 'Неверный email или пароль.'], 401);
        }

        $user  = Auth::user();
        $token = $user->createToken('API Token')->plainTextToken;

        $request->session()->put('user', [
            'name'  => $user->name,
            'email' => $user->email,
            'token' => $token,
        ]);

        return view('api.token', ['user' => $request->session()->get('user')]);
    }

    public function token(StoreLoginRequest $request)
    {
        return view('api.token', ['user' => $request->session()->get('user')]);
    }


    public function logout(StoreLoginRequest $request)
    {
        Auth::user()->currenAccessToken()->delete();
        $request->session()->forget('user');

        return redirect()->route('api.isLogouting');
    }
    public function isLogout()
    {
        return view('api.tokenIsDelete');
    }


    public function updateToken(StoreLoginRequest $request)
    {
        Auth::user()->currentAccessToken()->delete;
        $token = Auth::user()->createToken('API token')->plainTextToken;
        $user = $request->session()->get('user');
        $user['token'] = $token;
        $user_up = $request->session()->put('user', $user);

        return redirect()->route('api.token');
    }
}