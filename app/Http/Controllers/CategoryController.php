<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Product;

use function Ramsey\Uuid\v1;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            Category::create($request->all());
            return redirect()->route('categories.index')
                ->with('success', 'Categoría creada correctamente');
        } catch (\Exception $e) {
            $errorMessage = 'A ocurrido un error al crear la categoría: ' . $e->getMessage();
            return redirect()->route('categories.create')
                ->with('error', $errorMessage);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // productos de esta categoria
        $products = Product::where('category_id', $category->id)->get();
        return view('categories.show', compact('category', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->all());
            return redirect()->route('categories.index')
                ->with('success', 'Categoria actualizada correctamente');
        } catch (\Exception $e) {
            $errorMessage = 'A ocurrido un error al actualizar la categoria: ' . $e->getMessage();
            return redirect()->route('categories.edit', $category)
                ->with('error', $errorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories.index')
                ->with('success', 'Categoría eliminada correctamente');
        } catch (\Exception $e) {
            $errorMessage = 'A ocurrido un error al eliminar la categoría: ' . $e->getMessage();
            return redirect()->route('categories.index')
                ->with('error', $errorMessage);
        }
    }
}
