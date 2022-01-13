<div class="col-lg-6 col-md-6 col-sm-12">
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <span class="input-group-text input-gp">
                <i class="fas fa-search"></i>
            </span>
        </div>
        <input type="text" wire:model="search" placeholder="@if(request()->routeIs('pos')) Buscar por Nombre de {{$componentName}} @else Buscar {{$componentName}} @endif" class="form-control">
    </div>
</div>