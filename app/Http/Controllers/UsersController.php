<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function register(Request $request)
    {
        // Валидация данных из формы
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Создание нового пользователя с ролью "user" по умолчанию
        Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Добавляем роль "user"
        ]);

        // Редирект на страницу регистрации с сообщением об успешной регистрации
        return redirect()->route('register.form')->with('success', 'Регистрация успешна!');
    }
}
