<script src="{{asset ('assets/js/loader.js')}}"></script>
<link href="{{asset ('assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
<link href="{{asset ('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset ('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset ('assets/css/structure.css')}}" rel="stylesheet" type="text/css" class="structure" />
<link href="{{asset ('plugins/font-icons/fontawesome/css/fontawesome.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset ('css/fontawesome.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset ('assets/css/elements/avatar.css')}}" rel="stylesheet" type="text/css"/>

<link href="{{asset('plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('plugins/notification/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css"/>

<link href="{{asset ('css/custom.css')}}" rel="stylesheet" type="text/css"/>

<link href="{{asset ('assets/css/widgets/modules-widgets.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset ('assets/css/forms/theme-checkbox-radio.css')}}" rel="stylesheet" type="text/css"/>


<link href="{{asset ('assets/css/apps/scrumboard.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset ('assets/css/apps/notes.css')}}" rel="stylesheet" type="text/css"/>
<style>
    aside {
        display: none !important;
    }
    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #5c3b3b;
        border-color: #3b3f5c;
    }

    @media (max-width: 480px) {
        .mtmobile {
            margin-bottom: 20px !important;
        }
        .mbmobile {
            margin-bottom: 20px !important;
        }
        .hideonsm {
            display: none !important;
        }
        .inblock {
            display: block;
        }
    }
    /* Sidebar background*/
    .sidebar-theme #compactSidebar {
        background: #b82627 !important;
        width: 115px;
    }
    /* sidebar collapse background*/
    .header-container .sidebarCollapse {
        color: #fff !important;
    }
    .navbar .navbar-item .nav-item form.form-inline input.search-form-control {
        font-size: 15px;
        background-color: #191e3a !important;
        padding-right: 40px;
        padding-top: 12px;
        border: none;
        color: #fff;
        box-shadow: none;
        border-radius: 30px;
    }
    .navbar {
        background: #b82627 !important;
        border-bottom: none;
    }
    #content {
        margin-left: 110px;
        margin-top: 24px;
    }
    .tabmenu {
        text-transform: uppercase !important;
        padding: 10px 11px !important;
    }
    .widget {
        background-color: #e8e1d6 !important;
    }
    .widget h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: #553d34;
    }
    .badge-home {
        background-color: #553d34 !important;
        color: white;
    }
    .badge-home:hover {
        background-color: #e8e1d6 !important;
        color: #553d34 !important;
    }
    body {
        background-color: white!important;
    }
    .far {
        color: white;
    }
    .input-gp{
        background-color: #553d34 !important;
    }
    .btn-raikk{
        background-color: #553d34 !important;
        border-color: #553d34!important;
    }
    .input-group{
        border-color: #553d34!important;
    }
    .form-control{
        border: 1px solid #553d34;
    }
    .a-raikk{
        background: #553d34!important;
        border-color: #553d34!important;
    }
    .thead-raikk{
        background: #553d34!important;
        color: white!important;
    }
    .bg-raikk-beige{
        background: #e8e1d6!important;
        color: #553d34!important;
    }
    .bg-raikk-beige:hover{
        background: #e8e1d6!important;
        color: #553d34!important;
    }
    .bg-raikk-cafe{
        background: #553d34!important;
    }
    .bg-raikk-cafe:hover{
        background: #553d34!important;
    }
    .fas{
        color: white!important;
    }
    .img-raikk{
        width: 55px!important;
        height: 55px!important;
        border-radius: 50%!important;
    }
    .container-raikk{
        margin-top: 110px!important;
    }
</style>

<link href="{{asset ('plugins/flatpickr/flatpickr.dark.css')}}" rel="stylesheet" type="text/css"/>

@livewireStyles
{{-- <link href="{{asset ('plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset ('assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" class="dashboard-sales" /> --}}