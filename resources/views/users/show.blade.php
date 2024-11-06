@extends('layouts.app')

@section('title', 'users')

@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Usuario: {{ $user->name }}</h3>
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
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mb-5">
                                        <tbody>
                                            <tr>
                                                <td class="fw-bold fs-6">Nombre</td>
                                                <td class="fs-6">{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold fs-6">Username</td>
                                                <td class="fs-6">{{ $user->username }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold fs-6">Email</td>
                                                <td class="fs-6">{{ $user->email }}</td>
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
    </div>
@endsection
