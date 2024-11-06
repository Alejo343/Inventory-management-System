@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Clientes</h3>
                        <p class="text-subtitle text-muted">Lista de todos los clientes</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
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
                            Clientes
                        </h5>
                        <a href="{{ route('customers.create') }}" class="btn icon btn-primary">
                            <i class="bi bi-file-plus-fill"></i>
                            Agregar
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-start">Documento</th>
                                    <th class="text-start">Nombre</th>
                                    <th class="text-center align-middle">Correo</th>
                                    <th class="text-center align-middle">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customers as $customer)
                                    <tr>
                                        <td class="py-3 text-start">
                                            {{ $customer->document_number }}
                                        </td>
                                        <td class="py-3 text-start">
                                            {{ $customer->name }}
                                        </td>
                                        <td class="py-3 align-middle text-center">
                                            {{ $customer->email }}
                                        </td>
                                        <td class="py-3 align-middle text-end">
                                            <a href="{{ route('customers.show', $customer) }}"
                                                class="btn icon btn-primary mx-2">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('customers.edit', $customer) }}"
                                                class="btn icon btn-warning mx-2">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a class="btn icon btn-danger mx-2" data-bs-toggle="modal"
                                                data-bs-target="#danger-{{ $customer->id }}">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <!--Danger Modal -->
                                    <div class="modal fade text-left" id="danger-{{ $customer->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel120-{{ $customer->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title white" id="myModalLabel120">
                                                        Borrar Cliente
                                                    </h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Desea borrar el cliente {{ $customer->name }} de correo
                                                    {{ $customer->email }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Cancelar</span>
                                                    </button>
                                                    <!-- Formulario para hacer el DELETE -->
                                                    <form action="{{ route('customers.destroy', $customer) }}"
                                                        method="POST" class="d-inline">
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
                                @empty
                                    <tr>
                                        <td class="align-middle text-center" colspan="7">
                                            Sin resultados
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
