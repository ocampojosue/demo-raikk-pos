<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget">
            <div class="widget-heading">
                <h4 class="card-title text-center">
                    <b>Corte de Caja</b>
                </h4>
            </div>
            <div class="widget-content">
                @can('arqueo_consult')
                    <div class="row">
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <label>Usuario</label>
                                <select wire:model="userid" class="form-control">
                                    <option value="0" disabled>--Elegir--</option>
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                @error('userid')
                                    <span class="text-danger er">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <label>Fecha Inicial</label>
                                <input wire:model.lazy="fromDate" type="date" class="form-control">
                                @error('fromDate')
                                    <span class="text-danger er">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <label>Fecha Final</label>
                                <input wire:model.lazy="toDate" type="date" class="form-control">
                                @error('toDate')
                                    <span class="text-danger er">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 align-self-center d-flex justify-content-around">
                            @if ($userid >0 && $fromDate != null && $toDate != null)
                                <button wire:click.prevent="Consultar" type="button" class="btn btn-dark btn-raikk">Consultar</button>
                            @endif
                            @if ($total >0 && $fromDate != null && $toDate != null)
                                <button wire:click.prevent="Print" type="button" class="btn btn-dark btn-raikk">Imprimir</button>
                            @endif
                        </div>
                    </div>
                @endcan
            </div>
            <div class="row mt-5">
                <div class="col-sm-12 col-md-4 mb-mobile">
                    <div class="connect-sorting bg-raikk-cafe">
                        <h5 class="text-white">Ventas Totales: Bs. {{number_format($total,2)}}</h5>
                        <h5 class="text-white">Artículos: {{$items}}</h5>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mt-1">
                            <thead class="text-white thead-raikk">
                                <tr>
                                    <th class="table-th text-center text-white">FOLIO</th>
                                    <th class="table-th text-center text-white">TOTAL</th>
                                    <th class="table-th text-center text-white">ITEMS</th>
                                    <th class="table-th text-center text-white">FECHA</th>
                                    <th class="table-th text-center text-white"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($total <= 0)
                                    <tr>
                                        <td colspan="4"><h6 class="text-center">No hay ventas en la fecha seleccionada</h6></td>
                                    </tr>
                                @endif
                                @foreach ($sales as $sale)
                                    <tr>
                                        <td class="text-center">{{$sale->id}}</td>
                                        <td class="text-center"><h6>Bs. {{number_format($sale->total,2)}}</h6></td>
                                        <td class="text-center"><h6>{{$sale->items}}</h6></td>
                                        <td class="text-center"><h6>{{$sale->created_at}}</h6></td>
                                        <td class="text-center">
                                            <button wire:click.prevent="viewDetails({{$sale}})" class="btn btn-dark btn-raikk btn-sm">
                                                <i class="fas fa-list"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.cashout.modalDetails')
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('modal-hide', Msg => {
            $('#modalDetails').modal('hide')
        });
        window.livewire.on('modal-show', Msg => {
            $('#modalDetails').modal('show')
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