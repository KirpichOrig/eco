<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function showForm()
    {
        return view('pages.add'); // Указываем путь к файлу
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'cost' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Сохранение изображения
        $imagePath = $request->file('image')->store('products', 'public');
    
        // Создание товара в базе
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'cost' => $request->cost,
            'image' => $imagePath, // Сохраняем путь
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

        // Возвращаем представление и передаем товар
        return view('pages.edit', compact('product'));
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
        
        // Сохраняем товар
        $product->save();
    
        // Редирект с сообщением об успешном обновлении
        return redirect()->route('catalog')->with('success', 'Product updated successfully');
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
        return redirect()->route('catalog')->with('success', 'Product deleted successfully');
    }
}
