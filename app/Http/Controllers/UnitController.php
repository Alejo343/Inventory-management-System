<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Models\Product;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();
        return view('units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnitRequest $request)
    {
        try {
            Unit::create($request->all());
            return redirect()->route('units.index')
                ->with('success', 'Tipo de unidad creada correctamente');
        } catch (\Exception $e) {
            $errorMessage = 'A ocurrido un error al crear la unidad: ' . $e->getMessage();
            return redirect()->route('units.create')
                ->with('error', $errorMessage);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        $products = Product::where('unit_id', $unit->id)->get();
        return view('units.show', compact('unit', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        return view('units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        try {
            $unit->update($request->all());
            return redirect()->route('units.index')
                ->with('success', 'Tipo de unidad actualizada correctamente');
        } catch (\Exception $e) {
            $errorMessage = 'A ocurrido un error al actualizar la unidad: ' . $e->getMessage();
            return redirect()->route('units.edit', $unit->id)
                ->with('error', $errorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        try {
            if (Product::where('unit_id', $unit->id)) {
                return redirect()->route('units.index', $unit->id)
                    ->with('error', 'No se puede eliminar una unidad que se está utilizando en productos.');
            }
            $unit->delete();
            return redirect()->route('units.index')
                ->with('success', 'Tipo de unidad eliminada correctamente');
        } catch (\Exception $e) {
            $errorMessage = 'A ocurrido un error al eliminar la unidad: ' . $e->getMessage();
            return redirect()->route('units.index', $unit->id)
                ->with('error', $errorMessage);
        }
    }
}
