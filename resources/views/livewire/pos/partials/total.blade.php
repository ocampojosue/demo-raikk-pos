<div class="row">
    <div class="col-sm-12">
        <div class="connect-sorting bg-raikk-beige">
            <h5 class="text-center mb-3">RESUMEN DE VENTA</h5>
            <div class="connect-sorting-content">
                <div class="card simple-title-task ui-sortable-handle">
                    <div class="card-body">
                        <div class="task-header">
                            <div class="">
                                <h2>TOTAL: Bs. {{number_format($total, 2)}}</h2>
                                <input type="hidden" id="hiddenTotal" value="{{$total}}">
                            </div>
                            <div class="">
                                <h2 class="mt-3">Articulos: {{$itemsQuantity}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>