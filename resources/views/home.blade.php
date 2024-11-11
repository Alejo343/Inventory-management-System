@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Estadisticas</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-9">
                    {{-- TARJETAS --}}
                    <div class="row">
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon purple mb-2">
                                                <i class="bi bi-building-fill-down icono-personalizado"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Pedido de inventario</h6>
                                            <h6 class="font-extrabold mb-0">11 productos hoy</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon blue mb-2">
                                                <i class="bi bi-cart-fill icono-personalizado"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Ventas</h6>
                                            <h6 class="font-extrabold mb-0">20 productos hoy</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon green mb-2">
                                                {{-- <i class="iconly-boldAdd-User"></i> --}}
                                                <i class="bi bi-box2-fill icono-personalizado"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Total productos</h6>
                                            <h6 class="font-extrabold mb-0">80 Productos</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- GRafica --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Productos mas vendidos</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- INFORMACION --}}

                </div>
                {{-- INFORMACION ADICIONAL --}}
                <div class="col-12 col-lg-3">
                    {{-- usuario logeado --}}
                    {{-- <div class="card">
                        <div class="card-body py-4 px-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                </div>
                                <div class="ms-3 name">
                                    <h5 class="font-bold">John Duck</h5>
                                    <h6 class="text-muted mb-0">@johnducky</h6>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- Reposicion de productos --}}
                    <div class="card border-warning bg-warning text-dark">
                        <div class="card-header bg-warning text-dark">
                            <h4 class="font">Alerta: Cantidad de productos</h4>
                        </div>
                        <div class="card-content pb-4">
                            <div class="recent-message d-flex px-4 py-3 border">
                                <div class="name ms-4">
                                    <h5 class="mb-1">Producto 1</h5>
                                    <h6 class="text-muted mb-0">2 piezas</h6>
                                </div>
                            </div>
                            <div class="recent-message d-flex px-4 py-3 border-bottom">
                                <div class="name ms-4">
                                    <h5 class="mb-1">Producto 2</h5>
                                    <h6 class="text-muted mb-0">2 piezas</h6>
                                </div>
                            </div>
                            <div class="recent-message d-flex px-4 py-3 border-bottom">
                                <div class="name ms-4">
                                    <h5 class="mb-1">Producto 3</h5>
                                    <h6 class="text-muted mb-0">2 piezas</h6>
                                </div>
                            </div>
                            <div class="px-4">
                                <button class='btn btn-block btn-xl btn-outline-dark font-bold mt-3'>Reponer</button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Clientes con mas pedidos</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-visitors-profile"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
