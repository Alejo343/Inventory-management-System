<?php

namespace App\Http\Controllers;

use App\Enums\PurchaseStatus;
use App\Models\Purchase;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\PurchaseDetail;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    protected $suppliers;
    protected $status;

    public function __construct()
    {
        $this->suppliers = Supplier::all();
        $this->status = PurchaseStatus::cases();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::all();
        return view('purchases.index', [
            'purchases' => $purchases,
            'suppliers' => $this->suppliers,
            'status' => $this->status,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('purchases.create', [
            'suppliers' => $this->suppliers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePurchaseRequest $request)
    {
        try {
            $newPurchase = Purchase::create([
                'date' => $request->date,
                'supplier_id' => $request->supplier_id,
                'total_amount' => $request->total_amount,
                'total_amount' => $request->total_amount,
                'purchase_no' => $request->purchase_no,
                'status' => $request->status,
                'created_by' => $request->created_by,
            ]);

            $this->storePurchaseDetail($newPurchase, $request);

            return redirect()->route('purchases.index')->with('success', 'Compra creada exitosamente.');
        } catch (\Exception $e) {
            $errorMessage = 'Hubo un error al crear la compra: ' . $e->getMessage();
            return redirect()->route('purchases.create')->with('error', $errorMessage);
        }
    }

    public function storePurchaseDetail($newPurchase, $request)
    {
        try {
            foreach ($request->products as $product) {
                PurchaseDetail::create([
                    'purchase_id' => $newPurchase->id,
                    'product_id' => $product['product_id'],
                    'quantity' => $product['quantity'],
                    'unitcost' => $product['selling_price'],
                    'total' => $product['total'],
                ]);
            }
        } catch (\Throwable $e) {
            $errorMessage = 'Hubo un error al almacenar los productos de la compra: ' . $e->getMessage();
            return redirect()->route('purchases.create')->with('error', $errorMessage);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        $supplier = Supplier::where('id', $purchase->supplier_id)->first();
        $status = PurchaseStatus::cases();
        $purchaseDetails = PurchaseDetail::where('purchase_id', $purchase->id)->get();

        return view('purchases.show', compact('purchase', 'supplier', 'status', 'purchaseDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        $supplier = Supplier::where('id', $purchase->supplier_id)->first();
        $status = PurchaseStatus::cases();
        $purchaseDetails = PurchaseDetail::where('purchase_id', $purchase->id)->get();

        return view('purchases.edit', compact('purchase', 'supplier', 'purchaseDetails'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        try {
            $purchase->update($request->all());

            return redirect()->route('purchases.index')->with('success', 'Compra actualizada exitosamente.');
        } catch (\Exception $e) {
            $errorMessage = 'Hubo un error al actualizar la compra: ' . $e->getMessage();
            return redirect()->route('purchases.index')->with('error', $errorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        try {
            PurchaseDetail::where('purchase_id', $purchase->id)->delete();
            $purchase->delete();

            return redirect()->route('purchases.index')->with('success', 'Compra eliminada exitosamente.');
        } catch (\Exception $e) {
            $errorMessage = 'Hubo un error al eliminar la compra' . $e->getMessage();
            return redirect()->route('purchases.index')->with('error', $errorMessage);
        }
    }
}
