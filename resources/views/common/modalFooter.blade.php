</div>
<div class="modal-footer">
    <button type="button" wire:click.prevent="resetUI()" class="btn btn-dark close-btn bg-raikk-beige" data-dismiss="modal">
        <i class="las la-times"></i>
        CERRAR
    </button>
    @if ($selected_id < 1)
    <button type="button" wire:click.prevent="Store()" class="btn btn-dark btn-raikk close-modal">
        GUARDAR
    </button>
    @else
    <button type="button" wire:click.prevent="Update()" class="btn btn-dark btn-raikk close-modal">
        ACTUALIZAR
    </button>
    @endif
</div>
</div>
</div>
</div>