@extends('layouts.app')

@section('title', 'Ventas')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ordenes de ventas</h3>
                    <p class="text-subtitle text-muted">Listado de ventas</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ventas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <x-alert />
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title m-0">
                        Ventas
                    </h5>
                    <a href="{{ route('orders.create') }}" class="btn icon btn-primary">
                        <i class="bi bi-file-plus-fill"></i>
                        Agregar
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th class="text-start">Compra No.</th>
                                <th class="text-center align-middle">Cliente</th>
                                <th class="text-center align-middle">Fecha</th>
                                <th class="text-center align-middle">Total</th>
                                <th class="text-center align-middle">Estado</th>
                                <th class="text-center align-middle">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td class="py-3 text-start">
                                        {{ $order->invoice_no }}
                                    </td>
                                    <td class="py-3 align-middle text-center">
                                        {{ $order->customer->name }}
                                    </td>
                                    <td class="py-3 text-start">
                                        {{ $order->order_date }}
                                    </td>
                                    <td class="py-3 align-middle text-center">
                                        ${{ $order->total }}
                                    </td>
                                    <td class="py-3 align-middle text-center">

                                        @if ($order->order_status->value == 0)
                                            <span class="badge bg-warning">{{ $order->order_status->label() }}</span>
                                        @else
                                            <span class="badge bg-success">{{ $order->order_status->label() }}</span>
                                        @endif
                                    </td>
                                    <td class="py-3 align-middle text-end">
                                        <a href="{{ route('orders.show', $order) }}" class="btn icon btn-primary mx-2">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        @if ($order->order_status->value == 0)
                                            <a class="btn icon btn-success mx-2" data-bs-toggle="modal"
                                                data-bs-target="#warning-{{ $order->id }}">
                                                <i class="bi bi-check-lg"></i>
                                            </a>
                                        @endif
                                        <a class="btn icon btn-danger mx-2" data-bs-toggle="modal"
                                            data-bs-target="#danger-{{ $order->id }}">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal eliminar -->
                                <div class="modal fade text-left" id="danger-{{ $order->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel120-{{ $order->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title white" id="myModalLabel120">
                                                    Borrar Compra
                                                </h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Desea borrar la compra {{ $order->invoice_no }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Cancelar</span>
                                                </button>
                                                <!-- Formulario para hacer el DELETE -->
                                                <form action="{{ route('orders.destroy', $order) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger ms-1">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Aceptar</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal compra enviada -->
                                <div class="modal fade text-left" id="warning-{{ $order->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel120-{{ $order->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title white" id="myModalLabel120">
                                                    Envio producto
                                                </h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Desea enviar el producto {{ $order->invoice_no }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Cancelar</span>
                                                </button>
                                                <form action="{{ route('orders.update', $order) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('put')
                                                    <button type="submit" class="btn btn-success ms-1">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Aceptar</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td class="align-middle text-center" colspan="7">
                                        No results found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
