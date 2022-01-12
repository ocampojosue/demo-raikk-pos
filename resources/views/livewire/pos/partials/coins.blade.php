<div class="row mt-3">
    <div class="col-sm-12">
        <div class="connect-sorting bg-raikk-beige">
            <h5 class="text-center mb-2">DENOMINACIONES</h5>
            <div class="">
                <div class="row">
                    @foreach ($denominations as $denomination)
                        <div class="col-sm mt-2">
                            <button wire:click.prevent="ACash({{$denomination->value}})" class="btn btn-dark btn-block den btn-raikk">
                                {{$denomination->value > 0 ? 'Bs.'.number_format($denomination->value, 2, '.', '') : 'Exacto'}}
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="connect-sorting-content mt-4">
                <div class="card simple-title-task ui-sortable-handle">
                    <div class="card-body">
                        <div class="input-group input-group-md mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text input-gp hideonsm">Efectivo F8
                                </span>
                            </div>
                            <input type="number" id="cash" wire:model="efectivo" 
                            wire:keydown.enter="saveSale" 
                            class="form-control text-center" value="{{$efectivo}}">
                            <div class="input-group-append">
                                <span wire:click="$set('efectivo', 0)" class="input-group-text btn-raikk" >
                                    <i class="fas fa-backspace fa-2x"></i>
                                </span>
                            </div>
                        </div>
                        <h4 class="text-mute">Cambio: Bs. {{number_format($change, 2)}}</h4>
                        <div class="row justify-content-between mt-5">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                @if ($total > 0)
                                <button onclick="Confirm('', 'cleaCart', '¿SEGURO DE ELIMINAR EL CARRITO?')" class="btn btn-dark mtmobile btn-raikk">
                                    CANCELAR F4
                                </button>
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                @if ($efectivo >= 0 && $total > 0)
                                <button wire:click.prevent="saveSale" class="btn btn-dark btn-md btn-block btn-raikk">
                                    GUARDAR F9
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>