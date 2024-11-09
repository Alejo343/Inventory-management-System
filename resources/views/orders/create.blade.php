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
                                <form class="form" id="productForm" action="{{ route('orders.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="order_date">Fecha</label>
                                                <input type="date" id="order_date" class="form-control"
                                                    placeholder="fecha" name="order_date" value="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="slug">Seleccione el cliente</label>
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="customer" name="customer_id" required>
                                                        <option value="">Seleccina un cliente</option>
                                                        @foreach ($customers as $customer)
                                                            <option value="{{ $customer->id }}"
                                                                {{ isset($order) && $order->customer_id == $customer->id ? 'selected' : '' }}>
                                                                {{ $customer->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <livewire:order-table />


                                        {{-- <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="slug">Medio de pago: </label>
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="payment_type" name="payment_type"
                                                        required>
                                                        <option value="">Seleccina un medio de pago</option>
                                                        @foreach ($paymentTypes as $paymentType)
                                                            <option value="{{ $paymentType->value }}"
                                                                {{ isset($order) && $order->payment_type->value == $paymentType->value ? 'selected' : '' }}>
                                                                {{ $paymentType->label() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div> --}}

                                        {{-- <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pay">Pago: </label>
                                                <input type="number" min="1" id="pay" class="form-control"
                                                    placeholder="Valor pagado" name="pay">
                                            </div>
                                        </div> --}}

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Crear</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">limpiar</button>
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
    </div>
@endsection

@push('scripts')
    <script>
        let products = [];
        let subtotal = 0;
        let iva = 0;

        document.addEventListener('livewire:init', () => {
            Livewire.on('productos-actualizado', (event) => {
                products = event[0].products;
                subtotal = event[0].subtotal;
                iva = event[0].iva;
                total = event[0].total;
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

            createHiddenInput(formulario, 'total_products', products.length);
            createHiddenInput(formulario, `sub_total`, subtotal);
            createHiddenInput(formulario, `total`, total);
            createHiddenInput(formulario, `iva`, iva);

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
