<div wire:ignore.self class="modal fade" id="theModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-raikk-cafe">
                <h5 class="modal-title text-white">
                    <b>{{$componentName}}</b> | <b>{{$selected_id > 0 ? 'EDITAR' : 'CREAR'}}</b>
                </h5>
                <h6 class="text-center text-warning" wire:loading>POR FAVOR ESPERE</h6>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" wire:model.lazy="permissionName" class="form-control" placeholder="Ej: category_index">
                        </div>
                        @error('permissionName')
                            <span class="text-danger er">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" wire:model.lazy="description" class="form-control" placeholder="Ej: Ver Componente de Categorías">
                        </div>
                        @error('description')
                            <span class="text-danger er">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="resetUI()" class="btn btn-dark close-btn bg-raikk-beige text-white" data-dismiss="modal">
                    <i class="las la-times"></i>
                    CERRAR
                </button>
                @if ($selected_id < 1)
                <button type="button" wire:click.prevent="createPermission()" class="btn btn-dark btn-raikk close-modal">
                    GUARDAR
                </button>
                @else
                <button type="button" wire:click.prevent="updatePermission()" class="btn btn-dark btn-raikk close-modal">
                    ACTUALIZAR
                </button>
                @endif
            </div>
        </div>
    </div>
</div>