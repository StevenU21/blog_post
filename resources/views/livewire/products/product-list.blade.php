<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Productos</h3>
                    <a href="{{ route('products.create') }}" class="btn btn-primary" wire:navigate>
                        <i class="fas fa-plus"></i> Nuevo Producto
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col"><i class="fas fa-list-ol"></i> ID</th>
                            <th scope="col"><i class="fas fa-file-signature"></i> Nombre</th>
                            <th scope="col"><i class="fas fa-file-alt"></i> Descripción</th>
                            <th scope="col"><i class="fas fa-dollar-sign"></i> Precio</th>
                            <th scope="col"><i class="fas fa-boxes"></i> Stock</th>
                            <th scope="col"><i class="fas fa-tools"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr wire:key="product-{{ $product->id }}">
                                <td>
                                    <span class="badge badge-pill badge-primary"> {{ $product->id }} </span>
                                </td>
                                <td>
                                    {{ $product->name }}
                                </td>

                                <td>
                                    {{ $product->description }}
                                </td>

                                <td>
                                    {{ $product->price }}
                                </td>

                                <td>
                                    {{ $product->stock }}
                                </td>

                                <td style="white-space: nowrap; display: flex; align-items: center;">
                                    <a href="#" class="btn btn-primary btn-sm" style="margin-right: 5px;">
                                        <i class="fas fa-eye"></i> Mostrar
                                    </a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-info btn-sm" style="margin-right: 5px;" wire:navigate>
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        wire:click="delete({{ $product->id }})">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
