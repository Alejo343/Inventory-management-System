@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Lista de Productos</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-9">
                    @livewire('hello-world')
                </div>
            </section>
        </div>
    </div>
@endsection
