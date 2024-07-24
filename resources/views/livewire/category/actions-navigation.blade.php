<td style="white-space: nowrap; display: flex; align-items: center;">
    <a href="{{ route('categories.show', $category) }}" class="btn btn-primary btn-sm" style="margin-right: 5px;"
        wire:navigate>
        <i class="fas fa-eye"></i> Mostrar
    </a>
    <a href="{{ route('categories.edit', $category) }}" class="btn btn-info btn-sm" style="margin-right: 5px;"
        wire:navigate>
        <i class="fas fa-edit"></i> Editar
    </a>

    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
        style="display: inline-block; margin: 0; display: flex; align-items: center;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">
            <i class="fas fa-trash"></i> Eliminar
        </button>
    </form>
</td>
