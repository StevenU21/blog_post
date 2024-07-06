<!-- Modal para editar comentario -->
<div class="modal fade" id="editCommentModal{{ $comment->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editCommentModalLabel{{ $comment->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCommentModalLabel{{ $comment->id }}">Editar Comentario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="commentText{{ $comment->id }}">Comentario</label>
                        <textarea class="form-control" id="commentText{{ $comment->id }}" name="content" rows="3">{{ $comment->content }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
