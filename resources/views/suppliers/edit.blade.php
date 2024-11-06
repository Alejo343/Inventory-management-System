@extends('layouts.app')

@section('title', 'Proovedor')

@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>editar Proovedor : {{ $supplier->name }}</h3>
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
                                <form class="form" action="{{ route('suppliers.update', $supplier) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="name">Nombre</label>
                                                <input type="text" id="name" class="form-control"
                                                    placeholder="Nombre" name="name"
                                                    value="{{ old('name', $supplier->name) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" class="form-control"
                                                    placeholder="email" name="email"
                                                    value="{{ old('email', $supplier->email) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="shopname">Nombre de la tienda</label>
                                                <input type="text" id="shopname" class="form-control"
                                                    placeholder="Nombre de la tienda" name="shopname"
                                                    value="{{ old('shopname', $supplier->shopname) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="phone">Numero de contacto</label>
                                                <input type="tel" id="phone" class="form-control"
                                                    placeholder="Celular / Telefono" name="phone"
                                                    value="{{ old('phone', $supplier->phone) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="type">Tipo</label>
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="type" name="type" required>
                                                        <option value="">Seleccionar tipo</option>
                                                        @foreach ($types as $type)
                                                            <option value="{{ $type->value }}"
                                                                {{ old('type', $supplier->type->value ?? '') == $type->value ? 'selected' : '' }}>
                                                                {{ $type->label() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="account_holder">Nombre de cuenta</label>
                                                <input type="text" id="account_holder" class="form-control"
                                                    placeholder="Nombre de cuenta" name="account_holder"
                                                    value="{{ old('account_holder', $supplier->account_holder) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="account_number">Numero de cuenta</label>
                                                <input type="number" id="account_number" class="form-control"
                                                    placeholder="Nombre de cuenta" name="account_number"
                                                    value="{{ old('account_number', $supplier->account_number) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="bank_name">Nombre del banco</label>
                                                <input type="text" id="bank_name" class="form-control"
                                                    placeholder="Nombre del banco" name="bank_name"
                                                    value="{{ old('bank_name', $supplier->bank_name) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="address">Direccion</label>
                                                <input type="text" id="address" class="form-control"
                                                    placeholder="Direccion" name="address"
                                                    value="{{ old('address', $supplier->address) }}">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Aceptar</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Limpiar</button>
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
