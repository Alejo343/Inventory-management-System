<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\PaymentType;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Services\InvoiceService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $invoiceService;

    // Inyectar el servicio en el constructor
    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        $status = OrderStatus::cases();
        $customers = Customer::all();
        return view('orders.index', compact('orders', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = OrderStatus::cases();
        $customers = Customer::all();
        $paymentTypes = PaymentType::cases();
        return view('orders.create', compact('customers', 'status', 'paymentTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        // $this->showInvoice($request);

        try {
            $newOrder = Order::create([
                'customer_id' => $request->customer_id,
                'order_date' => $request->order_date,
                'order_status' => $request->order_status,
                'total_products' => $request->total_products,
                'sub_total' => $request->sub_total,
                'iva' => $request->iva,
                'total' => $request->total,
                'invoice_no' => $request->invoice_no,
            ]);

            $this->storeOrderDetail($newOrder, $request);
            $this->updateProductQuantity($request);

            return redirect()->route('orders.index')->with('success', 'Venta creada exitosamente.');
        } catch (\Exception $e) {
            $errorMessage = 'Hubo un error al crear la venta: ' . $e->getMessage();
            return redirect()->route('orders.create')->with('error', $errorMessage);
        }
    }

    //generar factura de compra
    public function showInvoice($request)
    {
        $details = [
            // 'total' => $request->total,
            'iva' => $request->iva,
            'invoice_no' => $request->invoice_no,
        ];

        //obtner todos los datos de los productos seleccionados
        $ids = collect($request->products)->pluck('product_id');
        $products = Product::whereIn('id', $ids)->get();

        //obtner todos los datos del cliente seleccionado
        $customer = Customer::find($request->customer_id);

        //generar factura
        $invoice = $this->invoiceService->crearFactura($products, $customer, $details);
        return $invoice->stream();
    }

    public function updateProductQuantity($request)
    {
        try {
            foreach ($request->products as $product) {
                $productModel = Product::where('id', $product['product_id'])->first();
                $productModel->quantity -= $product['quantity'];
                $productModel->save();
            }
        } catch (\Throwable $e) {
            $errorMessage = 'Hubo un error al actualizar la cantidad del producto: ' . $e->getMessage();
            return redirect()->route('orders.create')->with('error', $errorMessage);
        }
    }

    public function storeOrderDetail($newOrder, $request)
    {
        try {
            foreach ($request->products as $product) {
                OrderDetail::create([
                    'order_id' => $newOrder->id,
                    'product_id' => $product['product_id'],
                    'quantity' => $product['quantity'],
                    'unitcost' => $product['selling_price'],
                    'total' => $product['total'],
                ]);
            }
        } catch (\Throwable $e) {
            $errorMessage = 'Hubo un error al almacenar los productos de la compra: ' . $e->getMessage();
            return redirect()->route('orders.create')->with('error', $errorMessage);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $customer = Customer::find($order->customer_id);
        $status = OrderStatus::cases();
        $products = OrderDetail::where('order_id', $order->id)->get();

        dd($products);

        return view('orders.show', compact('order', 'customer', 'status', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Order $order)
    {
        try {
            //cambiar el estatus de order
            $order->order_status = OrderStatus::COMPLETE;
            $order->save();

            return redirect()->route('orders.index')->with('success', 'Compra' . $order->order_no . 'aprovada');
        } catch (\Exception $e) {
            $errorMessage = 'Hubo un error al actualizar la compra: ' . $e->getMessage();
            return redirect()->route('orders.index')->with('error', $errorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //destroy the order with trycatch
        try {
            $order->delete();
            OrderDetail::where('order_id', $order->id)->delete();

            return redirect()->route('orders.index')->with('success', 'La venta ha sido eliminada exitosamente.');
        } catch (\Exception $e) {
            $errorMessage = 'Hubo un error al eliminar la venta: ' . $e->getMessage();
            return redirect()->route('orders.index')->with('error', $errorMessage);
        }
    }
}
