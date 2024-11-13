@extends('layouts.app')

@section('title', 'Proovedor')

@section('content')
    <div class="page-heading">
        <h3>Proovedor: {{ $supplier->name }}</h3>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detalles del proovedor</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered mb-5">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold fs-6">Nombre</td>
                                            <td class="fs-6">{{ $supplier->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold fs-6">Correo</td>
                                            <td class="fs-6">{{ $supplier->email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold fs-6">Numero de contacto</td>
                                            <td class="fs-6">{{ $supplier->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold fs-6">Direccion</td>
                                            <td class="fs-6">{{ $supplier->address }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold fs-6">Tipo de medida</td>
                                            <td class="fs-6">
                                                <a href="#" class="badge text-bg-info">
                                                    {{ $supplier->type }}
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="fw-bold fs-6">Nombre de la tienda</td>
                                            <td class="fs-6">{{ $supplier->shopname }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold fs-6">Nombre de la cuenta bancaria</td>
                                            <td class="fs-6">{{ $supplier->account_holder }}</td>
                                        </tr>

                                        <tr>
                                            <td class="fw-bold fs-6">Numero de la cuenta bancaria</td>
                                            <td class="fs-6">{{ $supplier->account_number }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold fs-6">Banco</td>
                                            <td class="fs-6">{{ $supplier->bank_name }}</td>
                                        </tr>
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
