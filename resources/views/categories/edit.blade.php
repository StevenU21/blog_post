@extends('layouts.panel')
@section('title', 'Category/Update')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-plus-circle"></i> Actualizar Categoria</h3>
                    </div>
                    @livewire('category.form-navigation')
                </div>
            </div>
            <div class="card-body container-fluid">
                <form action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('categories.form')
                </form>
            </div>
        </div>
    </div>
@endsection
