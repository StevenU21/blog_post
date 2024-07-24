<div class="card mb-3" style="position: relative;">
    <div class="card-body">
        <!-- Contenedor para la imagen y el contenido -->
        <div style="display: flex; align-items: center;">
            <!-- Imagen de perfil del usuario -->
            <img src="{{ $comment->user->image() }}" alt="User Profile Image"
                style="width: 50px; height: 50px; border-radius: 50%; margin-right: 15px;">
            <!-- Contenido del comentario -->
            <div>
                <p>{{ $comment->content }}</p>
                <p class="text-muted">Por {{ $comment->user->name }} el
                    {{ $comment->created_at->format('d/m/Y') }} a las {{ $comment->created_at->format('H:i') }}</p>
            </div>
        </div>
        <!-- Opciones de Editar y Eliminar solo para el autor del comentario -->
        @if (auth()->user()->id == $comment->user_id)
            <div class="dropdown" style="position: absolute; top: 10px; right: 10px;">
                <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cogs"></i>
                </button>

                @include('components.comments.editmodal')

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a href="#" class="dropdown-item edit-button" style="margin-right: 5px;"
                        data-type="{{ $comment }}" data-toggle="modal"
                        data-target="#editCommentModal{{ $comment->id }}">
                        <i class="fas fa-edit"></i> Editar
                    </a>

                    <form class="deleteCommentForm" action="{{ route('comments.destroy', $comment->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-trash"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </div>
</div>

{{-- paginacion --}}
@include('components.comments.js')
