@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Ver producto: {{ $product->name }}</h3>
        </div>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detalles del producto</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mb-5">
                                        <tbody>
                                            <tr>
                                                <td class="fw-bold fs-6">Nombre</td>
                                                <td class="fs-6">{{ $product->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold fs-6">Slug</td>
                                                <td class="fs-6">{{ $product->slug }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold fs-6"><span class="text-secondary">Codigo</span></td>
                                                <td class="fs-6">{{ $product->code }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold fs-6">Categoria</td>
                                                <td class="fs-6">
                                                    <a href="{{ route('categories.show', $product->category->name) }}"
                                                        class="badge text-bg-info">
                                                        {{ $product->category->name }}
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold fs-6">Tipo de medida</td>
                                                <td class="fs-6">
                                                    <a href="#" class="badge text-bg-info">
                                                        {{ $product->unit->name }}
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="fw-bold fs-6">Cantidad</td>
                                                <td class="fs-6">{{ $product->quantity }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold fs-6">Quantity Alert</td>
                                                <td class="fs-6">
                                                    <span class="badge bg-light-danger">
                                                        {{ $product->quantity_alert }}
                                                    </span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="fw-bold fs-6">Precio de compra</td>
                                                <td class="fs-6">{{ $product->buying_price }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold fs-6">Precio de venta</td>
                                                <td class="fs-6">{{ $product->selling_price }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold fs-6">IVA</td>
                                                <td class="fs-6">
                                                    <span class="badge bg-light-danger">
                                                        {{ $product->iva }} %
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold fs-6">Tipo de IVA</td>
                                                <td class="fs-6">{{ $product->iva_type->value }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold fs-6">Notas</td>
                                                <td class="fs-6">{{ $product->notes }}</td>
                                            </tr>
                                        </tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
