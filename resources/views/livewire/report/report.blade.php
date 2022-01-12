<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget">
            <div class="widget-heading">
                <h4 class="card-title text-center">
                    <b>{{$componentName}}</b>
                </h4>
            </div>
            <div class="widget-content">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Elige el Usuario</h6>
                                <div class="form-group">
                                    <select wire:model="userId" class="form-control">
                                        <option value="0">Todos</option>
                                        @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    {{-- {{$userId}} --}}
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6>Elige el Tipo de Reporte</h6>
                                <div class="form-group">
                                    <select wire:model="reportType" class="form-control">
                                        <option value="0">Ventas del Dia</option>
                                        <option value="1">Ventas por Fecha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <h6>Fecha desde</h6>
                                <div class="form-group">
                                    <input type="text" wire:model="dateFrom" class="form-control flatpickr" placeholder="Clic para elegir la fecha">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <h6>Fecha hasta</h6>
                                <div class="form-group">
                                    <input type="text" wire:model="dateTo" class="form-control flatpickr" placeholder="Clic para elegir la fecha">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button wire:click="$refresh" class="btn btn-dark btn-raikk btn-block">
                                    Consultar
                                </button>
                                @can('report_pdf')
                                    <a class="btn btn-dark btn-raikk btn-block {{count($data) < 1 ? 'disabled' : ''}}" href="{{url('report/pdf' . '/' . $userId . '/' . $reportType . '/' . $dateFrom . '/'. $dateTo)}}" target="_blank">Generar PDF</a>
                                @endcan
                                @can('report_excel')
                                    <a class="btn btn-dark btn-raikk btn-block {{count($data) < 1 ? 'disabled' : ''}}" href="{{url('report/excel' . '/' . $userId . '/' . $reportType . '/' . $dateFrom . '/'. $dateTo)}}" target="_blank">Exportar a Excel</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9">
                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped mt-1">
                                <thead class="text-white thead-raikk">
                                    <tr>
                                        <th class="table-th text-white text-center">FOLIO</th>
                                        <th class="table-th text-white text-center">TOTAL</th>
                                        <th class="table-th text-white text-center">ITEMS</th>
                                        <th class="table-th text-white text-center">ESTADO</th>
                                        <th class="table-th text-white text-center">USUARIO</th>
                                        <th class="table-th text-white text-center">FECHA</th>
                                        <th class="table-th text-white text-center" width="50px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{$data}} --}}
                                    @if (count($data) < 1)
                                        <tr><td colspan="7" class="text-center"><h5>Este Usuario no tiene ventas</h5></td></tr>
                                    @endif
                                    @foreach ($data as $d)
                                        <tr>
                                            <td class="text-center"><h6>{{$d->id}}</h6></td>
                                            <td class="text-center"><h6>Bs. {{number_format ($d->total,2)}}</h6></td>
                                            <td class="text-center"><h6>{{$d->items}}</h6></td>
                                            <td class="text-center"><h6>{{$d->status}}</h6></td>
                                            <td class="text-center"><h6>{{$d->user}}</h6></td>
                                            <td class="text-center">
                                                <h6>
                                                    {{\Carbon\Carbon::parse($d->created_at)->format('d-m-Y')}}
                                                </h6>
                                            </td>
                                            <td class="text-center" width="50px">
                                                @can('report_details', Model::class)
                                                    <button wire:click.prevent="getDetails({{$d->id}})"
                                                    class="btn btn-dark btn-raikk btn-sm">
                                                    <i class="fas fa-list"></i>
                                                </button>
                                                @endcan
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
    </div>
    @include('livewire.report.sales-detail')
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr(document.getElementsByClassName('flatpickr'), {
            enableTime: false,
            dateFormat: 'Y-m-d',
            locale: {
                firstDayofWeek: 1,
                weekdays: {
                    shorthand: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                    longhand: [
                    "Domingo",
                    "Lunes",
                    "Martes",
                    "Miércoles",
                    "Jueves",
                    "Viernes",
                    "Sábado",
                    ],
                },
                months: {
                    shorthand: [
                    "Ene",
                    "Feb",
                    "Mar",
                    "Abr",
                    "May",
                    "Jun",
                    "Jul",
                    "Ago",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dic",
                    ],
                    longhand: [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre",
                    ],
                },
            }
        })
        //EVENTOS
        window.livewire.on('modal-show', msg => {
            $('#modalDetails').modal('show')
        });
        window.livewire.on('null-date', msg => {
            noty(msg)
        });
    })
</script>