@extends('layouts.app')

@section('title', 'Compra')

@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Resumen Compra / Recepcion de inventario</h3>
        </div>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detalles del proovedor y de la compra</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="date">Nombre</label>
                                            <input readonly type="text" id="date" class="form-control"
                                                name="date" value="{{ $supplier->name }}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="purchase_no">Nombre de la tienda</label>
                                            <input readonly type="text" id="purchase_no" class="form-control"
                                                name="purchase_no" value="{{ $supplier->shopname }}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="supplier">Tienda del Proveedor</label>
                                            <input readonly type="text" id="supplier" class="form-control"
                                                name="supplier" value="{{ $supplier->phone }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="supplier">Fecha de la compra</label>
                                            <input readonly type="text" id="supplier" class="form-control"
                                                name="supplier" value="{{ $purchase->date }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="supplier">Numero de la compra</label>
                                            <input readonly type="text" id="supplier" class="form-control"
                                                name="supplier" value="{{ $purchase->purchase_no }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="supplier">Total de la compra</label>
                                            <input readonly type="text" id="supplier" class="form-control"
                                                name="supplier" value="{{ $purchase->total_amount }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="supplier">Registro creado por:</label>
                                            <input readonly type="text" id="supplier" class="form-control"
                                                name="supplier" value="{{ $purchase->created_by }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="supplier">Registro actualizado por:</label>
                                            <input readonly type="text" id="supplier" class="form-control"
                                                name="supplier"
                                                value="{{ $purchase->updatedBy ? $purchase->updatedBy : 'Sin actualizar' }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="supplier">Direcccion del proovedor</label>
                                            <input readonly type="text" id="supplier" class="form-control"
                                                name="supplier" value="{{ $supplier->address }}">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="card-header">
                            <h4 class="card-title">Productos Agregados</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <table id="productsTable" class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchaseDetails as $purchaseDetail)
                                            <tr>
                                                <td>
                                                    <input readonly type="text" class="form-control"
                                                        value="{{ $purchaseDetail->product->name }}">
                                                </td>
                                                <td>
                                                    <input readonly type="text" class="form-control"
                                                        value="{{ $purchaseDetail->quantity }}">
                                                </td>
                                                <td>
                                                    <input readonly type="text" class="form-control"
                                                        value="{{ $purchaseDetail->unitcost }}">
                                                </td>
                                                <td>
                                                    <input readonly type="text" class="form-control"
                                                        value="{{ $purchaseDetail->total }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
