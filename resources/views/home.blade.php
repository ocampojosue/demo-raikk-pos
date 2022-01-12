@extends('layouts.theme.app')
@section('content')
<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h3 class="card-title">
                    <b>RESUMEN DE VENTAS</b>
                </h3>
            </div>
            <div class="widget-content">
                <div class="row layout-top-spacing">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="card component-card_8">
                                <div class="card-body">
                                    
                                    <div class="progress-order">
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <h4><b>VENTAS DEL DIA</b></h4>
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-droplet"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="progress-order-body">
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-left">
                                                    {{-- {{$fromday}}
                                                    {{$today}}
                                                    {{$sales_month}} --}}
                                                    @if ($sales_day->count() == 1)
                                                        <h6>{{$sales_day->count()}} Venta</h6>
                                                    @else
                                                        <h6>{{$sales_day->count()}} Ventas</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <a href="{{route('pos')}}" class="badge badge-home" style="padding: 7px 10px">IR AL COMPONENTE   </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="card component-card_8">
                                <div class="card-body">
                                    
                                    <div class="progress-order">
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <h4><b>VENTAS DEL MES</b></h4>
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-droplet"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="progress-order-body">
                                            <div class="row mt-4">
                                                
                                                <div class="col-md-12 text-left">
                                                    {{-- {{$frommonth}}
                                                    {{$tomonth}}
                                                    {{$sales_month}} --}}
                                                    @if ($sales_month->count() == 1)
                                                        <h6>{{$sales_month->count()}} Venta</h6>
                                                    @else
                                                        <h6>{{$sales_month->count()}} Ventas</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <a href="{{route('pos')}}" class="badge badge-home" style="padding: 7px 10px">IR AL COMPONENTE   </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="card component-card_8">
                                <div class="card-body">
                                    
                                    <div class="progress-order">
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <h4><b>VENTAS DEL AÑO</b></h4>
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-droplet"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="progress-order-body">
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-left">
                                                    {{-- {{$fromyear}}
                                                    {{$toyear}}
                                                    {{$sales_year}} --}}
                                                    @if ($sales_year->count() == 1)
                                                        <h6>{{$sales_year->count()}} Venta</h6>
                                                    @else
                                                        <h6>{{$sales_year->count()}} Ventas</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <a href="{{route('pos')}}" class="badge badge-home" style="padding: 7px 10px">IR AL COMPONENTE   </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    {{-- PRODUCTOS MAS VENDIDOS --}}
                    {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget widget-five">
                            <div class="widget-content">
                                <h4><b>PRODUCTO MÁS VENDIDO DEL DIA</b></h4>
                                <div class="w-content">
                                    <div class="">                                            
                                        <p class="task-left">{{$products_day->count()}}</p>
                                        <p class="task-completed"><span>NOMBRE DEL PRODUCTO: {{$products_day[0]->name}}</span></p>
                                        <p class="task-hight-priority"><span>TOTAL RECAUDADO: Bs. {{$products_day[0]->price}} </span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget widget-five">
                            <div class="widget-content">
                                <h4><b>PRODUCTO MÁS VENDIDO DEL MES</b></h4>
                                <div class="w-content">
                                    <div class="">                                            
                                        <p class="task-left">8</p>
                                        <p class="task-completed"><span>NOMBRE DEL PRODUCTO</span></p>
                                        <p class="task-hight-priority"><span>TOTAL RECAUDADO: Bs. 20 </span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        <div class="widget widget-five">
                            <div class="widget-content">
                                <h4><b>PRODUCTO MÁS VENDIDO DEL AÑO</b></h4>
                                <div class="w-content">
                                    <div class="">                                            
                                        <p class="task-left">8</p>
                                        <p class="task-completed"><span>NOMBRE DEL PRODUCTO</span></p>
                                        <p class="task-hight-priority"><span>TOTAL RECAUDADO: Bs. 20 </span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> --}}

                    {{-- COMPONENTES --}}

                    {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="card component-card_8">
                                <div class="card-body">
                                    
                                    <div class="progress-order">
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <h4><b>CATEGORÍAS</b></h4>
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-droplet"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="progress-order-body">
                                            <div class="row mt-4">
                                                
                                                <div class="col-md-12 text-left">
                                                    <h6>20 Ventas</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <a href="{{route('home')}}" class="badge badge-warning" style="padding: 7px 10px">IR AL COMPONENTE   </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="card component-card_8">
                                <div class="card-body">
                                    
                                    <div class="progress-order">
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <h4><b>PRODUCTOS</b></h4>
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-droplet"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="progress-order-body">
                                            <div class="row mt-4">
                                                
                                                <div class="col-md-12 text-left">
                                                    <h6>20 Ventas</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <a href="{{route('home')}}" class="badge badge-dark" style="padding: 7px 10px">IR AL COMPONENTE   </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="card component-card_8">
                                <div class="card-body">
                                    
                                    <div class="progress-order">
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <h4><b>USUARIOS</b></h4>
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-droplet"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="progress-order-body">
                                            <div class="row mt-4">
                                                
                                                <div class="col-md-12 text-left">
                                                    <h6>20 Ventas</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <a href="{{route('home')}}" class="badge badge-warning" style="padding: 7px 10px">IR AL COMPONENTE   </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="card component-card_8">
                                <div class="card-body">
                                    
                                    <div class="progress-order">
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <h4><b>MONEDAS</b></h4>
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-droplet"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="progress-order-body">
                                            <div class="row mt-4">
                                                
                                                <div class="col-md-12 text-left">
                                                    <h6>20 Ventas</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <a href="{{route('home')}}" class="badge badge-info" style="padding: 7px 10px">IR AL COMPONENTE   </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="card component-card_8">
                                <div class="card-body">
                                    
                                    <div class="progress-order">
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <h4><b>ARQUEOS</b></h4>
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-droplet"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="progress-order-body">
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-left">
                                                    <h6>20 Ventas</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <a href="{{route('home')}}" class="badge badge-success" style="padding: 7px 10px">IR AL COMPONENTE   </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="card component-card_8">
                                <div class="card-body">
                                    
                                    <div class="progress-order">
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <h4><b>REPORTES</b></h4>
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-droplet"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="progress-order-body">
                                            <div class="row mt-4">
                                                
                                                <div class="col-md-12 text-left">
                                                    <h6>20 Ventas</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <a href="{{route('home')}}" class="badge badge-warning" style="padding: 7px 10px">IR AL COMPONENTE   </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="card component-card_8">
                                <div class="card-body">
                                    
                                    <div class="progress-order">
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <h4><b>ROLES</b></h4>
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-droplet"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="progress-order-body">
                                            <div class="row mt-4">
                                                
                                                <div class="col-md-12 text-left">
                                                    <h6>20 Ventas</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <a href="{{route('home')}}" class="badge badge-dark" style="padding: 7px 10px">IR AL COMPONENTE   </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="card component-card_8">
                                <div class="card-body">
                                    
                                    <div class="progress-order">
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <h4><b>PERMISOS</b></h4>
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-droplet"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="progress-order-body">
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-left">
                                                    <h6>20 Ventas</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <a href="{{route('home')}}" class="badge badge-success" style="padding: 7px 10px">IR AL COMPONENTE   </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="card component-card_8">
                                <div class="card-body">
                                    
                                    <div class="progress-order">
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    <h4><b>ASIGNAR</b></h4>
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-droplet"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="progress-order-body">
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-left">
                                                    <h6>20 Ventas</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-order-header">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-12">
                                                    
                                                </div>
                                                <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                                    <a href="{{route('home')}}" class="badge badge-success" style="padding: 7px 10px">IR AL COMPONENTE   </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>      
    </div>
</div>
@endsection
