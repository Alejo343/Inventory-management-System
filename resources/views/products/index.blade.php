@extends('layouts.app')

@section('title', 'Productos')

@section('content')
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
                                    <a href="{{ route('products.show', $product) }}" class="btn icon btn-primary mx-2">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn icon btn-warning mx-2">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a class="btn icon btn-danger mx-2" data-bs-toggle="modal"
                                        data-bs-target="#danger-{{ $product->id }}">
                                        <i class="bi
                                            bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <!--Danger Modal -->
                            <div class="modal fade text-left" id="danger-{{ $product->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel120-{{ $product->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title white" id="myModalLabel120">
                                                Borrar producto
                                            </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Desea borrar el producto {{ $product->name }} con el codigo
                                            {{ $product->code }} ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Cancelar</span>
                                            </button>
                                            <!-- Formulario para hacer el DELETE -->
                                            <form action="{{ route('products.destroy', $product) }}" method="POST"
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
@endsection
