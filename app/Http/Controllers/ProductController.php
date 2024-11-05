<?php

namespace App\Http\Controllers;

use App\Enums\TaxType;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Unit;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();
        $ivaTypes = TaxType::cases();

        return view('products.create', compact('categories', 'units', 'ivaTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            Product::create($request->all());
            return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
        } catch (\Exception $e) {
            $errorMessage = 'Hubo un error al crear el producto: ' . $e->getMessage();
            return redirect()->route('products.create')->with('error', $errorMessage);
        }

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $categories = Category::all();
        $units = Unit::all();
        $ivaTypes = TaxType::cases();

        return view('products.show', compact('product', 'categories', 'units', 'ivaTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $units = Unit::all();
        $ivaTypes = TaxType::cases();
        return view('products.edit', compact('product', 'categories', 'units', 'ivaTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $product->update($request->all());
            return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
        } catch (\Exception $e) {
            $errorMessage = 'Hubo un error al actualizar el producto: ' . $e->getMessage();
            return redirect()->route('products.edit', $product)->with('error', $errorMessage);
        }

        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
        } catch (\Exception $e) {
            $errorMessage = 'Hubo un error al eliminar el producto: ' . $e->getMessage();
            return redirect()->route('products.index')->with('error', $errorMessage);
        }

        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
