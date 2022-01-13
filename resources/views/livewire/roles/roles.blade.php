<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title text-uppercase">
                    <b>{{$componentName}} | {{$pageTitle}}</b>
                </h4>
                <ul class="tabs tab-pills">
                    @can('role_create', Model::class)
                        <li>
                            <a href="javascript:void(0)" class="tabmenu btn-raikk" data-toggle="modal" data-target="#theModal">
                                Agregar
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
            @can('role_search')
                @include('common.searchbox')
            @endcan
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-stripped mt-1">
                        <thead class="text-white thead-raikk">
                            <tr>
                                <th class="table-th text-white">CÓDIGO</th>
                                <th class="table-th text-white text-center">DESCRIPCIÓN</th>
                                <th class="table-th text-white text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        @if ($roles->count())
                            @foreach ($roles as $role)
                                <tbody>
                                    <tr>
                                        <td>
                                            <h6>{{$role->id}}</h6>
                                        </td>
                                        <td class="text-center text-capitalize">
                                            <h6>{{$role->name}}</h6>
                                        </td>
                                        <td class="text-center">
                                            @can('role_update')
                                                <a href="javascript:void(0)"
                                                wire:click="Edit({{$role->id}})"
                                                class="btn btn-dark mtmobile btn-raikk" title="Editar Registro">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @endcan
                                            @can('role_destroy')
                                                <a href="javascript:void(0)" 
                                                onclick="Confirm({{$role->id}})"
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
                                <td colspan="3"><h4 class="text-center">
                                    No se encontraron coincidencias
                                </h6></td>
                            </tr>
                        @endif
                    </table>
                    {{$roles->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.roles.form')
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('role-added', msg => {
            $('#theModal').modal('hide')
            noty(msg)
        });
        window.livewire.on('role-updated', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        })

        window.livewire.on('role-deleted', msg => {
            noty(msg)
        })

        window.livewire.on('role-exist', msg => {
            noty(msg)
        })

        window.livewire.on('role-error', msg => {
            noty(msg)
        })

        window.livewire.on('hide-modal', msg => {
            $('#theModal').modal('hide')
        })


        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });
        
    });

    function Confirm(id){
        swal({
            title:'CONFIRMAR',
            text: '¿CONFIRMAS ELIMINAR EL REGISTRO?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3b3f5c',
            confirmButtonText: 'Aceptar'
        }).then(function(result){
            if(result.value){
                window.livewire.emit('destroy', id)
                swal.close()
            }
        })
    }
</script>