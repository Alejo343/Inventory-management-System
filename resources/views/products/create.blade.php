@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <div class="page-heading">
        <h3>Ingresar nuevo Producto</h3>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Multiple Column</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{ route('products.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Nombre del producto</label>
                                            <input type="text" id="name" class="form-control" placeholder="Nombre"
                                                name="name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="category">Categoría</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="category" name="category_id" required>
                                                    <option value="">Seleccionar categoría</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ isset($product) && $product->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="unit">Tipo de unidad</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="unit" name="unit_id" required>
                                                    <option value="">Seleccionar una unidad</option>
                                                    @foreach ($units as $unit)
                                                        <option value="{{ $unit->id }}"
                                                            {{ old('unit_id', $product->unit_id ?? '') == $unit->id ? 'selected' : '' }}>
                                                            {{ $unit->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="selling_price">Precio de venta</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="text" id="selling_price" class="form-control"
                                                    name="selling_price" value="{{ old('selling_price') }}"
                                                    placeholder="000" aria-label="Precio venta">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="buying_price">Precio de compra</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="text" id="buying_price" class="form-control"
                                                    name="buying_price" value="{{ old('buying_price') }}" placeholder="000"
                                                    aria-label="Precio compra">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="quantity">Cantidad</label>
                                            <input type="number" id="quantity" class="form-control" name="quantity"
                                                value="{{ old('quantity') }}"placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="quantity_alert">Alerta de cantidad</label>
                                            <input type="number" id="quantity_alert" class="form-control"
                                                name="quantity_alert" value="{{ old('quantity_alert') }}"
                                                placeholder="Alerta de cantidad">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="iva">IVA</label>
                                            <input type="number" id="iva" class="form-control" name="iva"
                                                value="{{ old('iva') }}" placeholder="IVA">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="iva_type">Tipo de iva</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="iva_type" name="iva_type" required>
                                                    <option value="">Seleccionar tipo de impuesto</option>
                                                    @foreach ($ivaTypes as $ivaType)
                                                        <option value="{{ $ivaType->value }}"
                                                            {{ old('iva_type', $product->iva_type ?? '') == $ivaType->value ? 'selected' : '' }}>
                                                            {{ $ivaType->label() }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="notes">Notas</label>
                                            <input type="text" id="notes" class="form-control" name="notes"
                                                value="{{ old('notes') }}" placeholder="Notas">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
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
            </div>
        </div>
    </section>
@endsection
