@extends('layouts.app')

@section('title', 'Unidad')

@section('content')
    <div class="page-heading">
        <h3>Unidad: {{ $unit->name }}</h3>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Listado de productos del tipo de unidad</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th class="text-start">Nombre del producto</th>
                                            <th class="text-center align-middle">Codigo del producto</th>
                                            <th class="text-center align-middle">Cantidad</th>
                                            <th class="text-center align-middle">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $product)
                                            <tr>
                                                <td class="py-3 text-start">
                                                    {{ $product->name }}
                                                </td>
                                                <td class="py-3 align-middle text-center">
                                                    {{ $product->code }}
                                                </td>
                                                <td class="py-3 align-middle text-center">
                                                    {{ $product->quantity }}
                                                </td>
                                                <td class="py-3 align-middle text-end">
                                                    <a href="{{ route('products.show', $product) }}"
                                                        class="btn icon btn-primary mx-2">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('products.edit', $product) }}"
                                                        class="btn icon btn-warning mx-2">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <a class="btn icon btn-danger mx-2" data-bs-toggle="modal"
                                                        data-bs-target="#danger-{{ $product->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <!--Danger Modal -->
                                            <div class="modal fade text-left" id="danger-{{ $product->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel120-{{ $product->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h5 class="modal-title white" id="myModalLabel120">
                                                                Borrar Categoria
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Desea borrar el producto {{ $product->name }}?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Cancelar</span>
                                                            </button>
                                                            <!-- Formulario para hacer el DELETE -->
                                                            <form action="{{ route('products.destroy', $product) }}"
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
                                                    No results found
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
