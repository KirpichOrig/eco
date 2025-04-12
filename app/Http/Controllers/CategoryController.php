<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.addcategory');
    }

    public function index(Request $request)
    {
        $categories = Category::all();
        $selectedCategory = $request->input('category');
        $selectedColor = $request->input('color');
        $sortBy = $request->input('sort_by', 'created_at'); // По умолчанию сортируем по дате добавления

        $products = Product::query();

        if ($selectedCategory) {
            $products->where('category_id', $selectedCategory);
        }

        if ($selectedColor) {
            $products->where('color', $selectedColor);
        }

        if ($sortBy === 'cost') {
            $products->orderBy('cost', 'asc');
        } elseif ($sortBy === 'cost_desc') {
            $products->orderBy('cost', 'desc');
        } else {
            $products->orderBy($sortBy, 'desc');
        }

        $products = $products->get();

        return view('pages.catalog', compact('products', 'categories', 'selectedCategory', 'selectedColor', 'sortBy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($validatedData);

        return back()->with('success', 'Категория успешно добавлена!');
    }
}