<!-- resources/views/posts/index.blade.php -->
@extends('layouts.panel')
@section('title', 'Post')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Posts</h3>
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nuevo Post
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3">
                        @foreach ($posts as $post)
                            <div class="col mb-4">
                                <div class="card shadow-sm h-100">
                                    <!-- Dropdown de opciones (editar y eliminar) -->
                                    @if (auth()->user()->id == $post->user_id)
                                        <div class="dropdown position-absolute" style="top: 10px; right: 10px;">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fas fa-cogs"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdownMenuButton">
                                                <a href="{{ route('posts.edit', $post) }}" class="dropdown-item">
                                                    <i class="fas fa-edit"></i> Editar
                                                </a>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="fas fa-trash"></i> Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                    <!-- Imagen de perfil del usuario -->
                                    <div class="user-info d-flex align-items-center px-3 py-2">
                                        <img src="{{ $post->user->image() }}" alt="Imagen de perfil"
                                            class="img-fluid rounded-circle mr-2" style="width: 50px; height: 50px;">
                                        <div>
                                            <h6 class="mb-0">{{ $post->user->name }}</h6>
                                            <p class="text-muted mb-0">{{ $post->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <!-- Cuerpo de la card -->
                                    <div class="card-body" style="cursor: pointer;"
                                        onclick="window.location='{{ route('posts.show', $post) }}'">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                                        <!-- Mostrar etiquetas -->
                                        <div class="mt-3">
                                            @foreach ($post->tags as $tag)
                                                <a href="{{ route('posts.tags', $tag->name) }}"
                                                    class="badge badge-primary">#{{ $tag->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-4">
                    {{ $posts->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
