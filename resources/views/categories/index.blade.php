@extends('layouts.panel')
@section('title', 'Category')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                @livewire('category.create-navigation')
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-list-ol"></i> ID</th>
                                <th scope="col"><i class="fas fa-heading"></i> Nombre</th>
                                <th scope="col"><i class="fas fa-calendar-check"></i> Fecha de Registro</th>
                                <th scope="col"><i class="fas fa-cogs"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $category->id }} </span>
                                    </td>
                                    <td>
                                        {{ $category->name }}
                                    </td>

                                    <td>
                                        {{ $category->created_at }}
                                    </td>
                                    @livewire('category.actions-navigation', ['category' => $category], key($category->id))
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav aria-label="..." class="d-flex flex-wrap justify-content-center justify-content-lg-start">
                        {{ $categories->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
