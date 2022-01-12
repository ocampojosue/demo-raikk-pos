@include('common.modalHead')
<div class="row">
    <div class="col-sm-12 col-md-8">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" wire:model.lazy="name" class="form-control" placeholder="EJ: Josue Ocampo">
            @error('name')
                <span class="text-danger er">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Teléfono</label>
            <input type="number" wire:model.lazy="phone" class="form-control" min="67000000" max="80000000" placeholder="EJ: 67690586">
            @error('phone')
                <span class="text-danger er">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label>Correo</label>
            <input type="email" wire:model.lazy="email" class="form-control" placeholder="EJ: admin@admin.com">
            @error('email')
                <span class="text-danger er">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" wire:model.lazy="password" class="form-control">
            @error('password')
                <span class="text-danger er">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label>Estado</label>
            <select wire:model.lazy="status" class="form-control">
                <option value="Elegir">--Elegir--</option>
                <option value="Active" @if ($status = 'Active') selected @endif>Activo</option>
                <option value="Locked" @if ($status = 'Locked') selected @endif>Bloqueado</option>
                {{$status}}
            </select>
            @error('status')
                <span class="text-danger er">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label>Asignar Rol</label>
            <select wire:model.lazy="profile" class="form-control">
                <option value="Elegir">--Elegir--</option>
                @foreach ($roles as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>                
                @endforeach
            </select>
            @error('profile')
                <span class="text-danger er">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label>Imagen de Perfil</label>
            <input type="file" wire:model="image" accept="image/x-png, image/jpeg, image/gif" class="form-control">
            @error('image')
                <span class="text-danger er">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>
@include('common.modalFooter')