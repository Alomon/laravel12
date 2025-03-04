<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Аутентификация
    public function login(Request $request) {
        if (!Auth::attempt($request->only('email', 'password'))) {
            throw new ApiException('Invalid credentials', 401);
        }

        $user = Auth::user();
        $user->api_token = Hash::make(Str::random(60));
        $user->save();

        // Ответ
        return response()->json([
            'user' => $user,
            'token' => $user->api_token,
        ])->setStatusCode(201);
    }

    // Регистрация
    public function register(RegisterRequest $request) {
        // Получение id роли 'Пользователь'
        $roleUser = Role::where('code', 'user')->first()->id;

        // Создаем нового пользователя
        $newUser = User::create([
            'surname' => $request->surname,
            'name' => $request->name,
            'patronymic' => $request->patronymic,
            'sex' => $request->sex,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'password' => $request->password,
            'api_token' => null,
            'role_id' => $roleUser,
        ]);

        // Генерация токена
        $newUser->api_token = Hash::make(Str::random(60));
        $newUser->save();

        // Ответ
        return response()->json([
            'user' => $newUser,
            'token' => $newUser->api_token,
        ])->setStatusCode(201);

    }

    // Выход
    public function logout(Request $request) {
        $user = Auth::user();
        $user->api_token = null;
        $user->save();

        // Ответ
        return response()->json([])->setStatusCode(204);
    }
}
