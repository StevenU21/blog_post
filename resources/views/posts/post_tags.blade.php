<!-- resources/views/posts/index.blade.php -->
@extends('layouts.panel')
@section('title', 'Post/Tags')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Posts etiquetados como: <strong>{{ $tag->name }}</strong></h3>
                        <span>
                            Encontrados: <strong>{{ $post_tag_count }}</strong>
                            {{ Str::plural('resultado', $post_tag_count) }},
                            cargados en <strong>{{ $formatted_time }}</strong>
                        </span>
                        <a href="{{ route('posts.index') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> Regresar a todos los posts
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-md-3 mb-4">
                                <div class="card shadow-sm" style="position: relative;">
                                    @if (auth()->user()->id == $post->user_id)
                                        <div class="dropdown" style="position: absolute; top: 10px; right: 10px;">
                                            <button class="btn btn-secondary dropdown-toggle btn-sm" type="button"
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
                                    <div class="card-body" style="cursor: pointer;"
                                        onclick="window.location='{{ route('posts.show', $post) }}'">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                                        <!-- Mostrar etiquetas -->
                                        <div class="mt-2">
                                            @foreach ($post->tags as $tag)
                                                <a href="{{ route('tags.show', $tag->id) }}"
                                                    class="badge badge-primary">#{{ $tag->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
