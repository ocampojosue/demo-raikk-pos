<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        <ul class="navbar-item flex-row">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{asset('assets/img/banner.png')}}" alt="">
            </a>
        </ul>
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>
        <ul class="navbar-item flex-row search-ul">
        </ul>
        <ul class="navbar-item flex-row navbar-dropdown">
            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @auth
                        <img class="img-raikk"  src="https://ui-avatars.com/api/?background=fff&color=B82627&size=600&name={{Auth::user()->name}}.&bold=true">
                    @endauth
                </a>
                <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section">
                        <div class="media mx-auto">
                            <img src="assets/img/logo_s.jpg" class="img-fluid mr-2" alt="avatar">
                            <div class="media-body">
                                @auth
                                    <h5>{{Auth::user()->name}}</h5>
                                    <p>{{Auth::user()->profile}}</p>
                                @endauth
                            </div>
                        </div>
                    </div>
                    {{-- <div class="dropdown-item">
                        <a href="user_profile.html">
                            <i class="fas fa-user"></i><span>Mi Perfil</span>
                        </a>
                    </div> --}}
                    <div class="dropdown-item">
                        <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Cerrar Sesión</span>
                        </a>
                        <form action="{{route('logout')}}" method="POST" id="logout-form">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>