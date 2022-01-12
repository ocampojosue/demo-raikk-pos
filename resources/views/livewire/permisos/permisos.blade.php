<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{$componentName}} | {{$pageTitle}}</b>
                </h4>
                <ul class="tabs tab-pills">
                    @can('permission_create')
                    <li>
                        <a href="javascript:void(0)" class="tabmenu btn-raikk" data-toggle="modal" data-target="#theModal">
                            Agregar
                        </a>
                    </li>
                    @endcan
                </ul>
            </div>
            @can('permission_search')
                @include('common.searchbox')
            @endcan
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-stripped mt-1">
                        <thead class="text-white thead-raikk">
                            <tr>
                                <th class="table-th text-white">ID</th>
                                <th class="table-th text-white text-center">SLUG</th>
                                <th class="table-th text-white text-center">DESCRIPCIÓN</th>
                                <th class="table-th text-white text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        @if ($permissions->count())
                            @foreach ($permissions as $permission)
                                <tbody>
                                    <tr>
                                        <td>
                                            <h6>{{$permission->id}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6>{{$permission->name}}</h6>
                                        </td>
                                        <td class="text-center">
                                            <h6>{{$permission->description}}</h6>
                                        </td>
                                        <td class="text-center">
                                            @can('permission_update')
                                                <a href="javascript:void(0)"
                                                wire:click="Edit({{$permission->id}})"
                                                class="btn btn-dark btn-raikk mtmobile" title="Editar Registro">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('permission_destroy')
                                                <a href="javascript:void(0)" 
                                                onclick="Confirm({{$permission->id}})"
                                                class="btn btn-dark btn-raikk" title="Eliminar Registro">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            @endcan
                                            
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"><h4 class="text-center">
                                    No se encontraron coincidencias
                                </h6></td>
                            </tr>
                        @endif
                    </table>
                    {{$permissions->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.permisos.form')
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('permission-added', msg => {
            $('#theModal').modal('hide')
            noty(msg)
        });
        window.livewire.on('permission-updated', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        })

        window.livewire.on('permission-deleted', msg => {
            noty(msg)
        })

        window.livewire.on('permission-exist', msg => {
            noty(msg)
        })

        window.livewire.on('permission-error', msg => {
            noty(msg)
        })

        window.livewire.on('hide-modal', msg => {
            $('#theModal').modal('hide')
        })


        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('hidden.bs.modal', msg => {
            $('.er').css('display', 'none')
        })
    });

    function Confirm(id){
        swal({
            title:'CONFIRMAR',
            text: '¿CONFIRMAS ELIMINAR EL REGISTRO?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#553d34',
            confirmButtonText: 'Aceptar'
        }).then(function(result){
            if(result.value){
                window.livewire.emit('destroy', id)
                swal.close()
            }
        })
    }
</script>