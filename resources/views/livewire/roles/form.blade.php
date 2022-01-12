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
                    <div class="col-sm-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-raikk-cafe">
                                    <span class="fas fa-edit"></span>
                                </span>
                            </div>
                            <input type="text" wire:model.lazy="roleName" class="form-control" placeholder="Ej: Admin">
                        </div>
                        @error('roleName')
                            <span class="text-danger er">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="resetUI()" class="btn bg-raikk-beige close-btn text-dark" data-dismiss="modal">
                    <i class="las la-times"></i>
                    CERRAR
                </button>
                @if ($selected_id < 1)
                <button type="button" wire:click.prevent="createRole()" class="btn btn-dark btn-raikk close-modal">
                    GUARDAR
                </button>
                @else
                <button type="button" wire:click.prevent="updateRole()" class="btn btn-dark btn-raikk close-modal">
                    ACTUALIZAR
                </button>
                @endif
            </div>
        </div>
    </div>
</div>