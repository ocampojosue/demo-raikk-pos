<div class="sidebar-wrapper sidebar-theme">
    <nav id="compactSidebar">
    <ul class="menu-categories">
        @can('category_index')
            <li class="active">
                <a href="{{route('categories')}}" class="menu-toggle" @if(request()->routeIs('categories')) data-active="true" @endif>
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                            <rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" 
                            height="7"></rect><rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect></svg>
                        </div>
                        <span>CATEGORÍAS</span>
                    </div>
                </a>
            </li>
        @endcan
        @can('product_index')
            <li class="">
            <a href="{{route('products')}}" class="menu-toggle" @if(request()->routeIs('products')) data-active="true" @endif>
                <div class="base-menu">
                    <div class="base-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                    </div>
                    <span>PRODUCTOS</span>
                </div>
            </a>
        </li>
        @endcan
        @can('sale_index')
            <li class="">
            <a href="{{route('pos')}}" class="menu-toggle" @if(request()->routeIs('pos')) data-active="true" @endif>
                <div class="base-menu">
                    <div class="base-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    </div>
                    <span>VENTAS</span>
                </div>
            </a>
        </li>
        @endcan
        @can('role_index')
            <li class="">
            <a href="{{route('roles')}}" class="menu-toggle" @if(request()->routeIs('roles')) data-active="true" @endif>
                <div class="base-menu">
                    <div class="base-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                    </div>
                    <span>ROLES</span>
                </div>
            </a>
        </li>
        @endcan
        @can('permission_index')
            <li class="">
            <a href="{{route('permissions')}}" class="menu-toggle" @if(request()->routeIs('permissions')) data-active="true" @endif>
                <div class="base-menu">
                    <div class="base-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                    </div>
                    <span>PERMISOS</span>
                </div>
            </a>
        </li>
        @endcan
        @can('asign_index')
            <li class="">
            <a href="{{route('asignar')}}" class="menu-toggle" @if(request()->routeIs('asignar')) data-active="true" @endif>
                <div class="base-menu">
                    <div class="base-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    </div>
                    <span>ASIGNAR</span>
                </div>
            </a>
        </li>
        @endcan
        @can('user_index')
            <li class="">
            <a href="{{route('users')}}" class="menu-toggle" @if(request()->routeIs('users')) data-active="true" @endif>
                <div class="base-menu">
                    <div class="base-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <span>USUARIOS</span>
                </div>
            </a>
        </li>
        @endcan
        @can('coin_index')
            <li class="">
            <a href="{{route('coins')}}" class="menu-toggle" @if(request()->routeIs('coins')) data-active="true" @endif>
                <div class="base-menu">
                    <div class="base-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-stop-circle"><circle cx="12" cy="12" r="10"></circle><rect x="9" y="9" width="6" height="6"></rect></svg>
                    </div>
                    <span>MONEDAS</span>
                </div>
            </a>
        </li>
        @endcan
        @can('arqueo_index')
            <li class="">
            <a href="{{route('cashout')}}" class="menu-toggle" @if(request()->routeIs('cashout')) data-active="true" @endif>
                <div class="base-menu">
                    <div class="base-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                    </div>
                    <span>ARQUEOS</span>
                </div>
            </a>
        </li>
        @endcan
        @can('report_index')
            <li class="">
            <a href="{{route('reports')}}" class="menu-toggle" @if(request()->routeIs('reports')) data-active="true" @endif>
                <div class="base-menu">
                    <div class="base-icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
                    </div>
                    <span>REPORTES</span>
                </div>
            </a>
        </li>
        @endcan

        
        
        
        
        
        
        
        
        
    </ul>
</nav>
</div>
<div id="compact_submenuSidebar" class="submenu-sidebar" style="display: none!important">
</div>