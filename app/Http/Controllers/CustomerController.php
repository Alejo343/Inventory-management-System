<?php

namespace App\Http\Controllers;

use App\Enums\CustomerType;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::All();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = CustomerType::cases();
        return view('customers.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        // dd($request->all());
        try {
            Customer::create($request->all());
            return redirect()->route('customers.index')->with('success', 'Cliente creado correctamente.');
        } catch (\Exception $e) {
            dd('mensaje: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al crear prooverdor' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $types = CustomerType::cases();
        return view('customers.show', compact('customer', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $types = CustomerType::cases();
        return view('customers.edit', compact('customer', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        dd($request->all());
        try {
            $customer->update($request->all());
            return redirect()->route('customers.index')
                ->with('success', 'Cliente actualizado correctamente');
        } catch (\Throwable $e) {
            $errorMessage = 'Ah ocurrido un error al actualizar el cliente: ' . $e->getMessage();
            return redirect()->route('customers.edit', $customer->id)
                ->with('error', $errorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
            return redirect()->route('customers.index')
                ->with('success', 'Cliente eliminado correctamente');
        } catch (\Throwable $e) {
            $errorMessage = 'Ah ocurrido un error al eliminar el cliente: ' . $e->getMessage();
            return redirect()->route('customers.show', $customer->id)
                ->with('error', $errorMessage);
        }
    }
}
