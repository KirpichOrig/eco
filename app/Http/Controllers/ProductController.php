<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function showForm()
    {
        $categories = Category::all();
        return view('pages.add', compact('categories')); // Передаем категории в представление
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'cost' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'color' => 'nullable|string|max:255',
        ]);

        // Сохранение изображения
        $imagePath = $request->file('image')->store('products', 'public');

        // Создание товара в базе
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'cost' => $request->cost,
            'image' => $imagePath, // Сохраняем путь
            'category_id' => $request->category_id,
            'color' => $request->color,
        ]);

        return redirect()->route('add.form')->with('success', 'Товар добавлен!');
    }

    public function index()
    {
        $products = Product::all();
        return view('pages.catalog', compact('products'));
    }

    // Метод для отображения формы редактирования
    public function edit($id)
    {
        // Находим товар по ID
        $product = Product::findOrFail($id);
        $categories = Category::all();

        // Возвращаем представление и передаем товар и категории
        return view('pages.edit', compact('product', 'categories'));
    }

    // Метод для обновления товара
    public function update(Request $request, $id)
    {
        // Валидация входных данных
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'cost' => 'required|numeric',
            'image' => 'nullable|image|max:2048', // проверка на изображение
            'category_id' => 'nullable|exists:categories,id',
            'color' => 'nullable|string|max:255',
        ]);

        // Получаем товар из базы данных
        $product = Product::findOrFail($id);

        // Проверка на наличие нового изображения
        if ($request->hasFile('image')) {
            // Сохранение нового изображения
            $imagePath = $request->file('image')->store('products', 'public');

            // Удаление старого изображения, если оно есть
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            // Обновляем путь к новому изображению
            $product->image = $imagePath;
        }

        // Обновление других данных товара
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->cost = $request->input('cost');
        $product->category_id = $request->input('category_id');
        $product->color = $request->input('color');

        // Сохраняем товар
        $product->save();

        // Редирект с сообщением об успешном обновлении
        return redirect()->route('catalog')->with('success', 'Товар обновлен!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.product', compact('product'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Удаление изображения с диска
        if ($product->image) {
            Storage::disk('public')->delete('products/' . $product->image);
        }

        // Удаление самого товара из базы данных
        $product->delete();

        // Редирект обратно на страницу каталога с сообщением об успешном удалении
        return redirect()->route('catalog')->with('success', 'Товар удален!');
    }
}