<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{$componentName}}</b>
                </h4>
            </div>
            <div class="widget-content">
                @can('asign_search')
                    @include('common.searchbox')
                @endcan
                <div class="form-inline">
                    @can('asign_select_rol')
                        <div class="form-group mr-5">
                            <select wire:model="role" class="form-control">
                                <option value="Elegir">--Seleccione una Rol--</option>
                                @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endcan
                    @can('asign_sync_all')
                        <button wire:click.prevent="SyncAll()" type="button" class="btn btn-dark btn-raikk mbmobile inblock mr-5">
                        Sincronizar Todos
                        </button>
                    @endcan
                    @can('asign_revoke_all')
                        <button onclick="revocar()" type="button" class="btn btn-dark btn-raikk mbmobile inblock mr-5">
                            Revocar Todos
                        </button>
                    @endcan
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped mt-1">
                                    <thead class="text-white thead-raikk">
                                        <tr>
                                            <th class="table-th text-white">CÓDIGO</th>
                                            <th class="table-th text-white text-center">PERMISOS</th>
                                            <th class="table-th text-white text-center">ROLES CON PERMISO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($permisos->count())
                                            @foreach ($permisos as $permiso)
                                        <tr>
                                            <td><h6 class="text-center">{{$permiso->id}}</h6></td>
                                            <td class="text-center">
                                                <div class="n-chk">
                                                    <label class="new-control new-checkbox checkbox-primary">
                                                        @can('asign_role')
                                                            <input type="checkbox"
                                                            wire:change="syncPermiso($('#p' + {{$permiso->id}}).is(':checked'), '{{$permiso->name}}')"
                                                            id="p{{$permiso->id}}"
                                                            value="{{$permiso->id}}"
                                                            class="new-control-input"
                                                            {{$permiso->checked == 1 ? 'checked' : ''}} class="new-control-input">
                                                        @endcan
                                                        <span class="new-control-indicator"></span>
                                                        <h6>{{$permiso->name}}</h6>
                                                    </label>
                                                </div>
                                                {{-- <div class="n-chk">
                                                    <label class="new-control new-checkbox checkbox-primary">
                                                    <input type="checkbox" class="new-control-input" checked>
                                                    <span class="new-control-indicator"></span>Primary fssdfsd dsfsdfsd
                                                    </label>
                                                </div> --}}
                                            </td>
                                            <td class="text-center">
                                                <h6>{{\App\Models\User::permission($permiso->name)->count()}}</h6>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3">
                                                    <h4 class="text-center">No se encontraron coincidencias</h4>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            
                            {{$permisos->links()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('sync-error', msg => {
            noty(msg)
        })
        window.livewire.on('permi', msg => {
            noty(msg)
        })
        window.livewire.on('syncall', msg => {
            noty(msg)
        })
        window.livewire.on('removeall', msg => {
            noty(msg)
        })
        
    });

    function revocar(){
        swal({
            title:'CONFIRMAR',
            text: '¿CONFIRMAS REVOCAR TODOS LOS PERMISOS?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3b3f5c',
            confirmButtonText: 'Aceptar'
        }).then(function(result){
            if(result.value){
                window.livewire.emit('revokeall')
                swal.close()
            }
        })
    }
</script>
