<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        // Получаем текущего авторизованного пользователя
        $user = Auth::user();

        // Передаем данные пользователя в представление
        return view('pages.profil', compact('user'));
    }
}
