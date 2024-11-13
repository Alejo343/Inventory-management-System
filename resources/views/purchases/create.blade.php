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
                            <x-alert />
                            <form class="form" id="productForm" action="{{ route('purchases.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="date">Fecha</label>
                                            <input type="date" id="date" class="form-control" placeholder="fecha"
                                                name="date" value="{{ date('Y-m-d') }}">
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

                                    <input hidden id="total-valor" name="total_amount">

                                    <livewire:product-table />

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Crear</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">limpiar</button>
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

@push('scripts')
    <script>
        let products = [];

        document.addEventListener('livewire:init', () => {
            Livewire.on('total-actualizado', (event) => {
                const total = event.total;
                console.log(total)
                const input = document.querySelector('#total-valor');
                if (input) {
                    input.value = event.total;
                }
            });
            Livewire.on('productos-actualizado', (event) => {
                products = event.products;
                console.log(products)
            });
        });

        function createHiddenInput(form, name, value) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = name;
            input.value = value;
            form.appendChild(input);
        }

        document.getElementById('productForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const formulario = document.getElementById('productForm');
            console.log(products);
            products.forEach((product, index) => {
                createHiddenInput(formulario, `products[${index}][product_id]`, product.product_id);
                createHiddenInput(formulario, `products[${index}][quantity]`, product.quantity);
                createHiddenInput(formulario, `products[${index}][selling_price]`, product.selling_price);
                createHiddenInput(formulario, `products[${index}][total]`, product.total);
            });

            this.submit();
        });
    </script>
@endpush
