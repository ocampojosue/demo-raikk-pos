<div class="connect-sorting bg-raikk-beige">
    <div class="connect-sorting-content">
        <div class="row">
            @include('common.searchbox')
            <livewire:search>
        </div>
        <div class="card simple-title-task ui-sortable-handle">
            <div class="card-body">
                @if ($search)
                    @if ($products->count())
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-4">
                            <thead>
                                <tr >
                                    <th class="thead-raikk">Producto</th>
                                    <th class="thead-raikk">Costo</th>
                                    <th class="thead-raikk">Precio</th>
                                    <th class="text-center thead-raikk">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                    <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg">
                                                </div>
                                                <p class="align-self-center mb-0">{{$product->name}}</p>
                                            </div>
                                        </td>
                                        <td>{{$product->cost}}</td>
                                        <td>{{$product->price}}</td>
                                        <td class=" text-center">
                                            <button wire:click.prevent="ScanCode({{$product->barcode}})" class="btn btn-dark mbmobile btn-raikk">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                            </button>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <h6>EL PRODUCTO NO EXISTE </h6>
                    @endif
                @endif
                @if ($total > 0)
                <div class="table-responsive tblscroll" style="max-height: 650px; overflow:hidden">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white thead-raikk">
                            <tr>
                                <th width="10%"></th>
                                <th class="table-th text-left text-white">DESCRIPCIÓN</th>
                                <th class="table-th text-center text-white">PRECIO</th>
                                <th width="13%" class="table-th text-center text-white">CANTIDAD</th>
                                <th class="table-th text-center text-white">TOTAL PARCIAL</th>
                                <th class="table-th text-center text-white">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                            <tr>
                                <td class="texte-center table-th">
                                    @if (count($item->attributes) > 0)
                                    <span>
                                        <img src="{{asset('storage/products/'.$item->attributes[0])}}" alt="Imagen" 
                                        height="90" width="90" class="rounded">
                                    </span>
                                    @endif
                                </td>
                                <td><h6>{{$item->name}}</h6></td>
                                <td lass="texte-center">Bs. {{number_format($item->price, 2)}}</td>
                                <td>
                                    <input type="number" id="r{{$item->id}}" 
                                    wire:change="updateQty({{$item->id}}, $('#r' + {{$item->id}}).val())"
                                    style="font-size:1rem!important"
                                    class="form-control text-center"
                                    value="{{$item->quantity}}">
                                </td>
                                <td class="text-center">
                                    <h6>
                                        ${{number_format($item->price * $item->quantity), 2}}
                                    </h6>
                                </td>
                                <td class="text-center">
                                    <button onclick="Confirm('{{$item->id}}', 'removeItem', '¿CONFIRMAS ELIMINAR EL REGISTRO?')" class="btn btn-dark mbmobile btn-raikk">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <button wire:click.prevent="decreaseQty({{$item->id}})" class="btn btn-dark mbmobile btn-raikk">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button wire:click.prevent="increaseQty({{$item->id}})" class="btn btn-dark mbmobile btn-raikk">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <h5 class="text-center">Agrega Productos a la venta</h5>
                @endif
                <div wire:loading.inline wire:target="saveSale" class="">
                    <h4 class="text-center">Guardando Venta...</h4>
                </div>
            </div>
        </div>
    </div>
</div>