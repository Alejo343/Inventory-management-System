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
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Lista de Productos</h3>
                        <p class="text-subtitle text-muted">Lista de todos los productos</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Productos</li>
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
                            Productos
                        </h5>
                        <a href="{{ route('products.create') }}" class="btn icon btn-primary">
                            <i class="bi bi-file-plus-fill"></i>
                            Agregar nuevo
                        </a>
                    </div>
                    <div class="card-body">
                        {{-- <livewire:product-table theme="bootstrap-5" /> --}}
                        <!-- TABLA -->

                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">categoria</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            @forelse ($products as $product)
                                <tr>
                                    <td class="py-3 align-middle text-center">
                                        {{ $product->code }}
                                    </td>
                                    <td class="py-3 align-middle">
                                        {{ $product->name }}
                                    </td>
                                    <td class="py-3 align-middle text-center">
                                        {{ $product->category->name }}
                                    </td>
                                    <td class="py-3 align-middle text-center">
                                        {{ $product->quantity }}
                                    </td>
                                    <td class="py-3 align-middle text-center">
                                        <a href="#" class="btn icon btn-primary mx-2">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="#" class="btn icon btn-warning mx-2">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#" class="btn icon btn-danger mx-2">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="align-middle text-center" colspan="7">
                                        No results found
                                    </td>
                                </tr>
                            @endforelse
                        </table>

                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
