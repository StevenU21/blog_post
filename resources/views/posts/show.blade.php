@extends('layouts.panel')
@section('title', 'Post/Show')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-newspaper"></i> Ver Post</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('posts.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-list"></i>
                            Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Información del Post</h6>
                <div class="pl-lg-4">
                    <!-- Detalles del Post -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="title"><i class="fas fa-heading"></i>
                                        Título</label>
                                    <p>{{ $post->title }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="title"><i class="fas fa-heading"></i>
                                        Usuario Imagen</label>
                                    <img src="{{ $post->user->image() }}" alt="User Profile Image"
                                        style="width: 50px; height: 50px; border-radius: 50%; margin-right: 15px;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="content"><i class="fas fa-align-left"></i>
                                        Contenido</label>
                                    <p>{{ $post->content }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="content"><i class="fas fa-align-left"></i>
                                        Usuario</label>
                                    <p>{{ $post->user->name }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="category"><i class="fas fa-tags"></i>
                                        Categoria</label>
                                    <p><span class="badge badge-success">{{ $post->category->name }}</span></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="register_date"><i
                                            class="fas fa-calendar-check"></i> Fecha de Registro</label>
                                    <p>{{ $post->created_at }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="tags"><i class="fas fa-hashtag"></i>
                                        Etiquetas</label>
                                    <p>
                                        @foreach ($post->tags as $tag)
                                            <span class="badge badge-primary">#{{ $tag->name }}</span>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sección de Comentarios -->
                <hr class="my-4" />


                <h6 class="heading-small text-muted mb-4">Comentarios</h6>
                <div class="pl-lg-4">
                    <div class="mb-3">
                        <form action="{{ route('comments.store', $post->id) }}" method="POST">
                            @csrf
                            @include('comments.form')
                        </form>

                    </div>
                    <div class="comments">

                        @foreach ($comments as $comment)
                            @include('comments.index')
                        @endforeach
                        <div class="d-flex justify-content-left">
                            {{ $comments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
