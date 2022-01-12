<div id="modalDetails" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark bg-raikk-cafe">
                <h5 class="modal-title text-white">
                    <b>Detalle de Ventas</b>
                </h5>
                <button class="close" data-dismiss="modal" type="button" aria-label="Close">
                    <span class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                        <table class="table table-bordered table-striped mt-1">
                            <thead class="text-white" style="background: #ae7c6a">
                                <tr>
                                    <th class="table-th text-center text-white">PRODUCTO</th>
                                    <th class="table-th text-center text-white">CANTIDAD</th>
                                    <th class="table-th text-center text-white">PRECIO</th>
                                    <th class="table-th text-center text-white">IMPORTE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $detail)
                                    <tr>
                                        <td class="text-center"><h6>{{$detail->product}}</h6></td>
                                        <td class="text-center"><h6>{{$detail->quantity}}</h6></td>
                                        <td class="text-center"><h6>Bs. {{number_format($detail->price,2)}}</h6></td>
                                        <td class="text-center"><h6>{{number_format($detail->quantity * $detail->price,2)}}</h6></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <td class="text-right">
                                    <h6>TOTALES</h6>
                                </td>
                                <td class="text-center">
                                    @if ($details)
                                        <h6>{{$details->sum('quantity')}}</h6>
                                    @endif
                                </td>
                                @if ($details)
                                    @php
                                        $mytotal = 0;   
                                    @endphp
                                    @foreach ($details as $detail)
                                        @php
                                            $mytotal += $detail->quantity * $detail->price;
                                        @endphp
                                    @endforeach
                                    <td></td>
                                    <td class="text-center">
                                        <h6 >{{number_format($mytotal,2)}}</h6>
                                    </td>
                                @endif
                            </tfoot>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>