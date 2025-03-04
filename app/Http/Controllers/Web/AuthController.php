<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            return back()->withErrors(['error' => 'Неправильный логин или пароль']);
        }


    }
    public function register(RegisterRequest $request){
        // Получение id роли 'Пользователь'
        $roleUser = Role::where('code', 'user')->first()->id;

        // Создаем пользователя
        $newUser = User::create([...$request->validated(), 'role_id' => $roleUser]);

        // Аутентификация пользователя
        Auth::login($newUser);

        return redirect()->route('home');
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('home');
    }
    public function showLoginForm(Request $request){
        return view('auth.login');
    }
    public function showRegistrationForm(Request $request){
        return view('auth.register');
    }
}
