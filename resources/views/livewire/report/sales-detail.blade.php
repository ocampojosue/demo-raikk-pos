<div wire:ignore.self class="modal fade" id="modalDetails" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-raikk-cafe">
                <h5 class="modal-title text-white">
                    <b>Detalle de Venta #{{$saleId}}</b>
                </h5>
                <h6 class="text-center text-warning" wire:loading>POR FAVOR ESPERE</h6>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-stripped mt-1">
                        <thead class="text-white" style="background: #ae7c6a">
                            <tr>
                                <th class="table-th text-white">FOLIO</th>
                                <th class="table-th text-white text-center">PRODUCTO</th>
                                <th class="table-th text-white text-center">PRECIO</th>
                                <th class="table-th text-white text-center">CANTIDAD</th>
                                <th class="table-th text-white text-center">IMPORT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $detail)
                                <tr>
                                    <td class="text-center"><h6>{{$detail->id}}</h6></td>
                                    <td class="text-center"><h6>{{$detail->product}}</h6></td>
                                    <td class="text-center"><h6>Bs. {{number_format($detail->price,2)}}</h6></td>
                                    <td class="text-center"><h6>{{number_format($detail->quantity,0)}}</h6></td>
                                    <td class="text-center"><h6>Bs. {{number_format($detail->price * $detail->quantity, 2)}}</h6></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"><h5 class="text-center font-weight-bold">TOTALES</h5></td>
                                <td>
                                    <h5 class="text-center">{{$countDetails}}</h5>
                                </td>
                                <td>
                                    <h5 class="text-center">
                                        Bs. {{number_format($sumDetails,2)}}
                                    </h5>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-raikk close-btn text-white" data-dismiss="modal" style="background: #343A40">
                    <i class="las la-times"></i>
                    CERRAR
                </button>
            </div>
        </div>
    </div>
</div>