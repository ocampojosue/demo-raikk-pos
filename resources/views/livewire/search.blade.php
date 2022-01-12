<div class="col-lg-6 col-md-6 col-sm-12">
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <span class="input-group-text input-gp">
                <i class="fas fa-search"></i>
            </span>
        </div>
        <form role="search"></form>
        <input type="text" id="code" type="text" wire:keydown.enter.prevent="$emit('scan-code', $('#code').val())" placeholder="Buscar por Barra" class="form-control">
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        Livewire.on('scan-code', action => {
            $('#code').val('')
        });
    });
</script>