<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }
    public function showCreateForm() {
        return view('category.create');
    }
    public function store(CategoryRequest $request) {
        $category = Category::create($request->validated());
        return redirect()->route('categories.index')->with('success', 'Категория успешно создана');
    }
    public function show($id) {
        $category = Category::findOrFail($id);
        return view('category.show', compact('category'));
    }
    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }
    public function update($id, CategoryRequest $request) {

        $category = Category::findOrFail($id);
        $category->update($request->validated());
        return redirect()->route('categories.index', $id)->with('success', 'Категория успешно обновлена');
    }
}
