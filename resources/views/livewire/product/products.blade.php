<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{$componentName}} | {{$pageTitle}}</b>
                </h4>
                <ul class="tabs tab-pills">
                    @can('product_create')
                        <li>
                            <a href="javascript:void(0)" class="tabmenu btn-raikk" data-toggle="modal" data-target="#theModal">
                                Agregar
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
            @can('product_search')
                @include('common.searchbox')
            @endcan
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-stripped mt-1">
                        <thead class="text-white thead-raikk">
                            <tr>
                                <th class="table-th text-white">ID</th>
                                <th class="table-th text-white text-center">DESCRIPCION</th>
                                <th class="table-th text-white text-center">CODIGO</th>
                                <th class="table-th text-white text-center">CATEGORIA</th>
                                <th class="table-th text-white text-center">PRECIO</th>
                                {{-- <th class="table-th text-white text-center">COSTO</th> --}}
                                <th class="table-th text-white text-center">STOCK</th>
                                <th class="table-th text-white text-center">INV. MIN.</th>
                                <th class="table-th text-white text-center">IMAGE</th>
                                <th class="table-th text-white text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($products->count())
                                @foreach ($products as $product)
                                    <tr>
                                        <td><h6 class="text-left">{{$product->id}}</h6></td>
                                        <td><h6 class="text-center">{{$product->name}}</h6></td>
                                        <td><h6 class="text-center">{{$product->barcode}}</h6></td>
                                        <td><h6 class="text-center">{{$product->category}}</h6></td>
                                        <td><h6 class="text-center">{{$product->price}}</h6></td>
                                        {{-- <td><h6 class="text-center">{{$product->cost}}</h6></td> --}}
                                        <td><h6 class="text-center">{{$product->stock}}</h6></td>
                                        <td><h6 class="text-center">{{$product->alerts}}</h6></td>
                                        <td class="text-center">
                                            <span>
                                                <img src="{{asset('storage/products/'.$product->imagen)}}" alt="imagen de ejemplo" height="70" width="80" class="rounded">
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            @can('product_update')
                                                <a href="javascript:void(0)"
                                            wire:click="Edit({{$product->id}})"
                                            class="btn btn-dark mt-mobile btn-raikk" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @endcan
                                            @can('product_destroy')
                                                <a href="javascript:void(0)"
                                            onclick="Confirm('{{$product->id}}')"
                                            class="btn btn-dark btn-raikk" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9"><h4 class="text-center">
                                        No se encontraron coincidencias
                                    </h6></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.product.form')
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('product-added', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('product-updated', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('product-deleted', msg => {
            // Escuchar notificacion
        });
        window.livewire.on('modal-show', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('modal-hide', msg => {
            $('#theModal').modal('hide')
        });
        window.livewire.on('hidden.bs.modal', msg => {
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
