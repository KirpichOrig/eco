<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = Category::all(); // Получаем все категории
        return view('pages.profil', compact('user', 'categories'));
    }
}