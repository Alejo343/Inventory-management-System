@extends('layouts.app')

@section('title', 'Cliente')

@section('content')
    <div class="page-heading">
        <h3>Cliente: {{ $customer->document_number }}</h3>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detalles del cliente</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered mb-5">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold fs-6">Nombre</td>
                                            <td class="fs-6">{{ $customer->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold fs-6">Documento</td>
                                            <td class="fs-6">{{ $customer->document_number }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold fs-6">Tipo de cliente</td>
                                            <td class="fs-6">{{ $customer->customer_type->label() }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold fs-6">Email</td>
                                            <td class="fs-6">{{ $customer->email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold fs-6">Numero de contacto</td>
                                            <td class="fs-6">{{ $customer->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold fs-6">Titular de la cuenta</td>
                                            <td class="fs-6">{{ $customer->account_holder }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold fs-6">Numero de la cuenta</td>
                                            <td class="fs-6">{{ $customer->account_number }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold fs-6">Banco</td>
                                            <td class="fs-6">{{ $customer->bank_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold fs-6">Direccion</td>
                                            <td class="fs-6">{{ $customer->address }}</td>
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
