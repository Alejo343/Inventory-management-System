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
                                <form action="">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="date">Fecha</label>
                                                <input type="text" id="date" class="form-control"
                                                    placeholder="fecha" name="date" value="{{ $purchase->date }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="slug">Seleccione el proovedor</label>
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="supplier" name="supplier_id" required>
                                                        <option value="">Seleccina un Proovedor</option>
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{ $supplier->id }}"
                                                                {{ isset($purchase) && $purchase->supplier_id == $supplier->id ? 'selected' : '' }}>
                                                                {{ $supplier->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
