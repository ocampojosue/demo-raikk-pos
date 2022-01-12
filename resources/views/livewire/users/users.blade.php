<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{$componentName}} | {{$pageTitle}}</b>
                </h4>
                <ul class="tabs tab-pills">
                    @can('user_create')
                        <li>
                            <a href="javascript:void(0)" class="tabmenu btn-raikk" data-toggle="modal" data-target="#theModal">
                                Agregar
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
            @can('user_search')
                @include('common.searchbox')
            @endcan
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-stripped mt-1">
                        <thead class="text-white thead-raikk">
                            <tr>
                                <th class="table-th text-white">CÓDIGO</th>
                                <th class="table-th text-white text-center">USUARIO</th>
                                <th class="table-th text-white text-center">TELÉFONO</th>
                                <th class="table-th text-white text-center">CORREO</th>
                                <th class="table-th text-white text-center">PERFIL</th>
                                <th class="table-th text-white text-center">ESTADO</th>
                                <th class="table-th text-white text-center">IMAGEN</th>
                                <th class="table-th text-white text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->count())
                                @foreach ($users as $user)
                                    <tr>
                                        <td><h6>{{$user->id}}</h6></td>
                                        <td><h6>{{$user->name}}</h6></td>
                                        <td><h6>{{$user->phone}}</h6></td>
                                        <td><h6>{{$user->email}}</h6></td>
                                        <td class="text-uppercase"><h6>{{$user->profile}}</h6></td>
                                        <td>
                                            <span style="" class="badge {{$user->status == 'Active' ? 'badge-success' : 'badge-danger'}} text-uppercase">
                                                @if ($user->status == 'Active')
                                                    ACTIVO
                                                @else
                                                    INACTIVO
                                                @endif
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span>
                                                <img src="{{asset('storage/users/'.$user->imagen)}}" alt="imagen" height="60" width="70" class="rounded">
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            @can('user_update')
                                                <a href="javascript:void(0)" wire:click="edit({{$user->id}})" class="btn btn-dark btn-raikk mt-mobile" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('user_destroy')
                                                <a href="javascript:void(0)" onclick="Confirm('{{$user->id}}')" class="btn btn-dark btn-raikk" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            @endcan
                                            {{-- <a href="javascript:void(0)" onclick="Confirm('{{$user->id}}')" class="btn btn-dark  btn-raikk @cannot('user_update') disabled @endcan" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8">
                                        <h4 class="text-center">No se encontraron coincidencias</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.users.form')
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('user-added', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        })
        window.livewire.on('user-updated', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        })
        window.livewire.on('user-deleted', Msg => {
            noty(Msg)
        })
        window.livewire.on('modal-hide', Msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('modal-show', Msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('user-withsales', Msg => {
            noty(Msg)
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
                window.livewire.emit('deleteRow', id)
                swal.close()
            }
        })
    }
</script>