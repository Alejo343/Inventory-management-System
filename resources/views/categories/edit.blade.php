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
            <h3>Editar Categoria</h3>
        </div>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detalles de la categoria</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                <form action="{{ route('categories.update', $category) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="name">Nombre de la categoria</label>
                                                <input type="text" id="name" class="form-control"
                                                    placeholder="Nombre" name="name"
                                                    value="{{ old('name', $category->name) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <input type="text" id="slug" class="form-control" name="slug"
                                                    value="{{ old('slug', $category->slug) }}" placeholder="Notas">
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
                </div>
            </div>
        </section>
    </div>
@endsection
