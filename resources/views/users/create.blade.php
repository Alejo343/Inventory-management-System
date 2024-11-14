@extends('layouts.app')

@section('title', 'Categoria')

@section('content')
    <div class="page-heading">
        <h3>Crear Usuario</h3>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detalles de usuario</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{ route('user.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" id="name" class="form-control" placeholder="Nombre"
                                                name="name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="role">Rol</label>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="role" name="role" required>
                                                    <option value="">Seleccionar un tipo</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->value }}"
                                                            {{ old('role') == $role->value ? 'selected' : '' }}>
                                                            {{ $role->label() }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" class="form-control" placeholder="email"
                                                name="email" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="username">username</label>
                                            <input type="text" id="username" class="form-control" placeholder="username"
                                                name="username" value="{{ old('username') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="password">Contraseña</label>
                                            <input type="password" id="password" class="form-control"
                                                placeholder="password" name="password" value="{{ old('password') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirmar contrasña</label>
                                            <input type="password" id="password_confirmation" class="form-control"
                                                placeholder="Confirmar contrasña" name="password_confirmation"
                                                value="{{ old('password_confirmation') }}">
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
