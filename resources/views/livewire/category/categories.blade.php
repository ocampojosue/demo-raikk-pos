<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{$componentName}} | {{$pageTitle}}</b>
                </h4>
                <ul class="tabs tab-pills">
                    @can('category_create')
                        <li>
                        <a href="javascript:void(0)" class="tabmenu btn-raikk" data-toggle="modal" data-target="#theModal">
                            Agregar
                        </a>
                    </li>
                    @endcan
                </ul>
            </div>
            @can('category_search')
                @include('common.searchbox')
            @endcan
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-stripped mt-1">
                        <thead class="text-white thead-raikk">
                            <tr>
                                <th class="table-th text-white">ID</th>
                                <th class="table-th text-white text-center">DESCRIPTION</th>
                                <th class="table-th text-white text-center">IMAGE</th>
                                <th class="table-th text-white text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($categories->count())
                                @foreach ($categories as $category)
                                    <tr>
                                        <td><h6>{{$category->id}}</h6></td>
                                        <td class="text-center"><h6>{{$category->name}}</h6></td>
                                        <td class="text-center">
                                            <span>
                                                <img src="{{asset('storage/categories/'.$category->imagen)}}" alt="imagen de ejemplo" height="70" width="80" class="rounded">
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            @can('category_update')
                                                <a href="javascript:void(0)"
                                                wire:click="Edit({{$category->id}})"
                                                class="btn btn-dark mt-mobile btn-raikk" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @endcan
                                            @can('category_destroy')
                                                <a href="javascript:void(0)"
                                                onclick="Confirm('{{$category->id}}',
                                                {{$category->products->count()}})"
                                                class="btn btn-dark btn-raikk" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4"><h4 class="text-center">
                                        No se encontraron coincidencias
                                    </h6></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.category.form')
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('category-deleted', msg => {
            noty(msg)
        });
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('category-added', msg => {
            $('#theModal').modal('hide')
            noty(msg)
        });
        window.livewire.on('category-updated', msg => {
            $('#theModal').modal('hide')
            noty(msg)
        });
    });

    function Confirm(id, products){
        if (products > 0) {
            // swal.fire('NO SE PUEDE ELIMINAR LA CATEGORIA PORQUE TIENE PRODUCTOS RELACIONADOS')
            swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'NO SE PUEDE ELIMINAR LA CATEGORIA PORQUE TIENE PRODUCTOS RELACIONADOS',
        })
        return;
        }
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