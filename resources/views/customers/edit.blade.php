@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <div class="page-heading">
        <h3>Editar cliente: {{ $customer->document_number }}</h3>
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

                            <form action="{{ route('customers.update', $customer) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" id="name" class="form-control" placeholder="Nombre"
                                                name="name" value="{{ old('name', $customer->name) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="document_number">Numero de cedula</label>
                                            <input type="text" id="document_number" class="form-control"
                                                placeholder="No." name="document_number"
                                                value="{{ old('document_number', $customer->document_number) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" class="form-control" placeholder="email"
                                                name="email" value="{{ old('email', $customer->email) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="customer_type">Tipo de cliente</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="type" name="customer_type" required>
                                                    <option value="">Seleccionar tipo</option>
                                                    @foreach ($types as $type)
                                                        <option value="{{ $type->value }}"
                                                            {{ old('type', $customer->customer_type->value ?? '') == $type->value ? 'selected' : '' }}>
                                                            {{ $type->label() }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="phone">Numero de contacto</label>
                                            <input type="tel" id="phone" class="form-control"
                                                placeholder="Telefono / celular" name="phone"
                                                value="{{ old('phone', $customer->phone) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="account_holder">Titular de la cuenta bancaria</label>
                                            <input type="text" id="account_holder" class="form-control"
                                                placeholder="Titular" name="account_holder"
                                                value="{{ old('account_holder', $customer->account_holder) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="account_number">Numero de la cuenta bancaria</label>
                                            <input type="number" min="1" id="account_number" class="form-control"
                                                placeholder="No." name="account_number"
                                                value="{{ old('account_number', $customer->account_number) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="bank_name">Banco</label>
                                            <input type="text" id="bank_name" class="form-control"
                                                placeholder="Nombre del banco" name="bank_name"
                                                value="{{ old('bank_name', $customer->bank_name) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="address">Direccion</label>
                                            <input type="text" id="address" class="form-control"
                                                placeholder="Direccion" name="address"
                                                value="{{ old('address', $customer->address) }}">
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
