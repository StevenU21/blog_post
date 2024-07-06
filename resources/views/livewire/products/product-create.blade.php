<div class="col-xl-12 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0"><i class="fas fa-plus-circle"></i> Registrar Producto</h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary" wire:navigate><i
                            class="fas fa-arrow-left"></i>
                        Volver</a>
                </div>
            </div>
        </div>
        <div class="card-body container-fluid">
            <form wire:submit.prevent="save">
                <h6 class="heading-small text-muted mb-4">Datos Principales</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-name">Nombre</label>
                                <input type="text" id="input-name" wire:model.defer="product.name"
                                    class="form-control form-control-alternative" placeholder="Nombre">
                                @error('product.name')
                                    <div class="invalid-feedback d-flex align-items-center">
                                        <i class="fas fa-exclamation-circle mr-2"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-price">Precio</label>
                                <input type="number" id="input-price" wire:model.defer="product.price"
                                    class="form-control form-control-alternative" placeholder="Precio">

                                @error('product.price')
                                    <div class="invalid-feedback d-flex align-items-center">
                                        <i class="fas fa-exclamation-circle mr-2"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-stock">Stock</label>
                                <input type="number" id="input-stock" wire:model.defer="product.stock"
                                    class="form-control form-control-alternative" placeholder="Stock">
                                    @error('product.stock')
                                    <div class="invalid-feedback d-flex align-items-center">
                                        <i class="fas fa-exclamation-circle mr-2"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />
                <!-- Extra -->
                <h6 class="heading-small text-muted mb-4">Información Adicional</h6>
                <div class="pl-lg-4">
                    <div class="form-group">
                        <label for="description">Contenido</label>
                        <textarea rows="4" wire:model.defer="product.description" id="description"
                            class="form-control form-control-alternative" placeholder="Escriba algo..."></textarea>
                            @error('product.description')
                            <div class="invalid-feedback d-flex align-items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>

                <hr class="my-4" />
                <!-- Contenido -->
                <h6 class="heading-small text-muted mb-4">Guardar</h6>
                <div class="pl-lg-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Registrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
