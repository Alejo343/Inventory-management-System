@extends('layouts.app')

@section('title', 'Compra')

@section('content')
    <div class="page-heading">
        <h3>Crear Compra / Recepcion de inventario</h3>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detalles de Compra</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="order_date">Compra No.</label>
                                        <input readonly type="text" id="order_date"
                                            class="form-control"value="{{ $order->invoice_no }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="order_date">Fecha</label>
                                        <input readonly type="text" id="order_date"
                                            class="form-control"value="{{ $order->order_date }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="slug">Nombre del cliente</label>
                                        <input readonly type="text" id="order_date" class="form-control"
                                            value="{{ $order->customer->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="slug">Telefono del cliente</label>
                                        <input readonly type="number" id="order_date" class="form-control"
                                            value="{{ $order->customer->phone }}">
                                    </div>
                                </div>

                                <table id="productsTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio unitario</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    {{ $product->product->name }}
                                                </td>

                                                <!-- Columna Cantidad -->
                                                <td>
                                                    {{ $product->quantity }}
                                                </td>

                                                <!-- Columna Precio -->
                                                <td>
                                                    {{ $product->unitcost }}
                                                </td>

                                                <!-- Columna Total -->
                                                <td>
                                                    {{ $product->total }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                            @if ($errors->any())
                                <div>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Total/h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="totalTable" style="max-width: 20%;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Subtotal</th>
                                        <th>
                                            {{ $product->sub_total }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>IVA</th>
                                        <th>
                                            {{ $product->iva }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <th>
                                            {{ $product->total }}
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
