@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Editar Usuario: {{ $user->username }}</h3>
        </div>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detalles del usuario</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                <form action="{{ route('user.update', $user) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="name">Nombre del usuario</label>
                                                <input required type="text" id="name" class="form-control"
                                                    placeholder="Nombre" name="name"
                                                    value="{{ old('name', $user->name) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="username">username</label>
                                                <input required type="text" id="username" class="form-control"
                                                    name="username" value="{{ old('username', $user->username) }}"
                                                    placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email">email</label>
                                                <input required type="email" id="email" class="form-control"
                                                    name="email" value="{{ old('email', $user->email) }}"
                                                    placeholder="email">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="Limpiar"
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
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Cambiar contraseña</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('user.updatePassword', $user) }}" id="formularioPassword"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="password">Contraseña</label>
                                                <input required type="password" id="password" class="form-control"
                                                    name="password" value="" placeholder="Confirmar contraseña">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirmar contraseña</label>
                                                <input required type="password" id="password_confirmation"
                                                    class="form-control" name="password_confirmation" value=""
                                                    placeholder="Confirmar contraseña">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="Limpiar"
                                                class="btn btn-light-secondary me-1 mb-1">Limpiar</button>
                                        </div>
                                    </div>
                                </form>
                                @if ($errors->hasBag('formularioPassword'))
                                    <div>
                                        <ul>
                                            @foreach ($errors->formularioPassword->all() as $error)
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
