<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{$componentName}} | {{$pageTitle}}</b>
                </h4>
                <ul class="tabs tab-pills">
                    @can('coin_create')
                        <li>
                            <a href="javascript:void(0)" class="tabmenu btn-raikk" data-toggle="modal" data-target="#theModal">
                                Agregar
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
            @can('coin_search')
                @include('common.searchbox')
            @endcan
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-stripped mt-1">
                        <thead class="text-white thead-raikk">
                            <tr>
                                <th class="table-th text-white">ID</th>
                                <th class="table-th text-white text-center">TIPO</th>
                                <th class="table-th text-white text-center">VALOR</th>
                                <th class="table-th text-white text-center">IMAGEN</th>
                                <th class="table-th text-white text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($coins->count())
                                @foreach ($coins as $coin)
                                    <tr>
                                        <td><h6>{{$coin->id}}</h6></td>
                                        <td class="text-center"><h6>{{$coin->type}}</h6></td>
                                        <td class="text-center"><h6>Bs. {{number_format($coin->value,2)}}</h6></td>
                                        <td class="text-center">
                                            <span>
                                                <img src="{{asset('storage/denominations/'.$coin->imagen)}}" alt="imagen de ejemplo" height="70" width="80" class="rounded">
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            @can('coin_update')
                                                <a href="javascript:void(0)" 
                                                wire:click="Edit({{$coin->id}})"
                                                class="btn btn-dark btn-raikk mt-mobile" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('coin_destroy')
                                                <a href="javascript:void(0)"
                                                onclick="Confirm('{{$coin->id}}')"
                                                class="btn btn-dark btn-raikk" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">
                                        <h4 class="text-center">No se encontraron coincidencias</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{$coins->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.denomination.form')
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('item-added', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('item-updated', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('item-deleted', msg => {
            // Escuchar notificacion
        });
        window.livewire.on('modal-show', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('modal-hide', msg => {
            $('#theModal').modal('hide')
        }); 
        // window.livewire.on('hidden.bs.modal', msg => {
        //     $('.er').css('display', 'none')
        // });

        $('#theModal').on('hidden.bs.modal', function(e) {
            $('.er').css('display', 'none')
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
                window.livewire.emit('deleteRow', id)
                swal.close()
            }
        })
    }
</script>