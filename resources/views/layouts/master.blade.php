<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Smart Driving Labs - CRM</title>
    <link href="{{ URL::asset('css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/dropzone.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/jquery.atwho.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/fonts/flaticon.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/bootstrap-tour-standalone.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/picker.classic.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/summernote.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/vis-timeline@7.3.4/styles/vis-timeline-graph2d.min.css">
    <link rel="stylesheet" href="{{ asset(elixir('css/vendor.css')) }}">
    <link rel="stylesheet" href="{{ asset(elixir('css/app.css')) }}">
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{ asset(elixir('css/bootstrap-select.min.css')) }}">
    <link rel="shortcut icon" href="{{{ asset('images/favicon.png') }}}">
    
    <script src="https://js.stripe.com/v3/"></script>
    <style>
            .nav-tabs > li.active {
                transition: all 0.3s;
                background: #242939;
                color: #ffffff;
                border-radius: 0.25rem;
                text-decoration: none;
            }
            .nav-link {
                color: #555;
            }
            .nav-link:hover{
                color: #555;
            }
    </style>
    @stack('style')
</head>
<body>

<div id="wrapper">

@include('layouts._navbar')
<!-- /#sidebar-wrapper -->
    <!-- Sidebar menu -->

    <nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm" role="navigation">
        <div class="list-group panel">
            <p class=" list-group-item siderbar-top" title=""><img src="{{ URL::asset('images/sdl-logo-page.png') }}" alt="" style="width: 100%; margin: 1em 0;"></p>
            <a href="{{route('dashboard')}}" class=" list-group-item" data-parent="#MainMenu"><i
                        class="fa fa-home sidebar-icon"></i><span id="menu-txt">{{ __('Dashboard') }} </span></a>
            <a href="{{route('users.show', \Auth::user()->external_id)}}" class=" list-group-item"
               data-parent="#MainMenu"><i
                        class="fa fa-user sidebar-icon"></i><span id="menu-txt">{{ __('Profile') }}</span> </a>
            <a href="#clients" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="fa fa-user-secret sidebar-icon"></i><span id="menu-txt">{{ __('Clients') }}</span>
                <i class="icon ion-md-arrow-dropup arrow-side sidebar-arrow"></i></a>
            <div class="collapse" id="clients">

                <a href="{{ route('clients.index')}}" class="list-group-item childlist"> <i
                            class="bullet-point"><span></span></i> {{ __('All Clients') }}</a>
                @if(Entrust::can('client-create'))
                    <a href="{{ route('clients.create')}}" id="newClient"
                       class="list-group-item childlist"> <i
                                class="bullet-point"><span></span></i> {{ __('New Client') }}</a>
                @endif
            </div>
            <a href="#projects" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="fa fa-briefcase sidebar-icon "></i><span id="menu-txt">{{ __('Projects') }}</span>
                <i class="icon ion-md-arrow-dropup arrow-side sidebar-arrow"></i></a>
            <div class="collapse" id="projects">
                <a href="{{ route('projects.index')}}" class="list-group-item childlist"> <i
                            class="bullet-point"><span></span></i> {{ __('All Projects') }}</a>
                @if(Entrust::can('project-create'))
                    <a href="{{ route('projects.create')}}" id="newProject"  class="list-group-item childlist"> <i
                                class="bullet-point"><span></span></i> {{ __('New Project') }}</a>
                @endif
            </div>
            <a href="#tasks" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="fa fa-tasks sidebar-icon "></i><span id="menu-txt">{{ __('Tasks') }}</span>
                <i class="icon ion-md-arrow-dropup arrow-side sidebar-arrow"></i></a>
            <div class="collapse" id="tasks">
                <a href="{{ route('tasks.index')}}" class="list-group-item childlist"> <i
                            class="bullet-point"><span></span></i> {{ __('All Tasks') }}</a>
                @if(Entrust::can('task-create'))
                    <a href="{{ route('tasks.create')}}" id="newTask" class="list-group-item childlist"> <i
                                class="bullet-point"><span></span></i> {{ __('New Task') }}</a>
                @endif
            </div>

            <a href="#user" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="fa fa-users sidebar-icon"></i><span id="menu-txt">{{ __('Users') }}</span>
                <i class="icon ion-md-arrow-dropup arrow-side sidebar-arrow"></i></a>
            <div class="collapse" id="user">
                <a href="{{ route('users.index')}}" class="list-group-item childlist"> <i
                            class="bullet-point"><span></span></i> {{ __('All Users') }}</a>
                @if(Entrust::can('user-create'))
                    <a href="{{ route('users.create')}}"
                       class="list-group-item childlist"> <i class="bullet-point"><span></span></i> {{ __('New User') }}
                    </a>
                @endif
            </div>

            <a href="#leads" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="fa fa-hourglass-2 sidebar-icon"></i><span id="menu-txt">{{ __('Leads') }}</span>
                <i class="icon ion-md-arrow-dropup arrow-side sidebar-arrow"></i></a>
            <div class="collapse" id="leads">
                <a href="{{ route('leads.unqualified')}}" class="list-group-item childlist"> <i
                            class="bullet-point"><span></span></i> {{ __('Unqualified Leads') }}</a>
                @if(Entrust::can('lead-create'))
                    <a href="{{ route('leads.create')}}"
                       class="list-group-item childlist"> <i class="bullet-point"><span></span></i> {{ __('New Lead') }}
                    </a>
                @endif
            </div>

            <a href="#inventory" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="fa fa-folder-o sidebar-icon"></i><span id="menu-txt">{{ __('Inventory Control') }}</span>
                <i class="icon ion-md-arrow-dropup arrow-side sidebar-arrow"></i></a>
            <div class="collapse" id="inventory">
                <a href="{{ route('items.index') }}" class="list-group-item childlist"> <i
                            class="bullet-point"><span></span></i> {{ __('All Inventory') }}</a>
                @if(Entrust::can('lead-create'))
                    <a href="{{ route('items.create') }}"
                       class="list-group-item childlist"> <i class="bullet-point"><span></span></i> {{ __('New Item') }}
                    </a>
                @endif
            </div>

            @if(Entrust::can('calendar-view'))
                <a href="#appointments" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                            class="fa fa-calendar sidebar-icon"></i><span id="menu-txt">{{ __('Appointments') }}</span>
                    <i class="icon ion-md-arrow-dropup arrow-side sidebar-arrow"></i></a>
                <div class="collapse" id="appointments">
                    <a href="{{ route('appointments.calendar')}}" target="_blank"
                       class="list-group-item childlist"> <i
                                class="bullet-point"><span></span></i> {{ __('Calendar') }}</a>
                </div>
            @endif
            <a href="#hr" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="fa fa-handshake-o sidebar-icon"></i><span id="menu-txt">{{ __('HR') }}</span>
                <i class="icon ion-md-arrow-dropup arrow-side sidebar-arrow"></i></a>
            <div class="collapse" id="hr">
                @if(Entrust::can('absence-view'))
                    <a href="{{ route('absence.index')}}"
                       class="list-group-item childlist"> <i
                                class="bullet-point"><span></span></i> {{ __('Absence overview') }}</a>
                @endif
                @if(Entrust::can('absence-manage'))
                    <a href="{{ route('absence.create', ['management' => "true"])}}"
                       class="list-group-item childlist"> <i
                                class="bullet-point"><span></span></i> {{ __('Register absence') }}</a>
                @endif
                <a href="{{ route('departments.index')}}"
                   class="list-group-item childlist"> <i
                            class="bullet-point"><span></span></i> {{ __('Departments') }}</a>
            </div>

            @if(Entrust::hasRole('administrator') || Entrust::hasRole('owner'))
                <a href="#settings" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                            class="fa fa-cog sidebar-icon"></i><span id="menu-txt">{{ __('Settings') }}</span>
                    <i class="icon ion-md-arrow-dropup arrow-side sidebar-arrow"></i></a>
                <div class="collapse" id="settings">
                    <a href="{{ route('settings.index')}}"
                       class="list-group-item childlist"> <i
                                class="bullet-point"><span></span></i> {{ __('Overall Settings') }}</a>

                    <a href="{{ route('roles.index')}}"
                       class="list-group-item childlist"> <i
                                class="bullet-point"><span></span></i> {{ __('Role & Permissions Management') }}</a>
                    <a href="{{ route('integrations.index')}}"
                       class="list-group-item childlist"> <i
                                class="bullet-point"><span></span></i> {{ __('Integrations') }}</a>
                </div>
            @endif
        </div>
    </nav>


    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="global-heading">@yield('heading')</h1>
                    @yield('content')
                </div>
            </div>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>

        @endif
        @if(Session::has('flash_message_warning'))

            <message message="{{ Session::get('flash_message_warning') }}" type="warning"></message>
        @endif
        @if(Session::has('flash_message'))
            <message message="{{ Session::get('flash_message') }}" type="success"></message>
        @endif
    </div>

    <!-- /#page-content-wrapper -->
</div>

<script type="text/javascript" src="{{ URL::asset('js/manifest.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/vendor.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/dropzone.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jasny-bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.caret.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.atwho.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/summernote.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery-ui-sortable.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-tour-standalone.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/picker.js') }}"></script>


@if(App::getLocale() == "dk")
<script>
    $(document).ready(function () {
        $.extend( $.fn.pickadate.defaults, {
            monthsFull:  [ 'Janeiro', 'Fevereiro', 'Marco', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ],
            monthsShort: [ 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' ],
            weekdaysFull: [ 'Domingo', 'Segunda-Feira', 'Terca-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado' ],
            weekdaysShort: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab' ],
            today: 'Hoje',
            clear: false,
            close: 'X',
            firstDay: 1,
            format: 'dddd/mm/yyyy',
            formatSubmit: 'dddd/mm/yyyy',
        });
    });
</script>
@endif
@stack('scripts')
<script>
    window.trans = <?php
    // copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
    try {
        $filename = File::get(resource_path() . '/lang/' . App::getLocale() . '.json');
    } catch (\Illuminate\Contracts\Filesystem\FileNotFoundException $e) {
        return;
    }
    $trans = [];
    $entries = json_decode($filename, true);
    foreach ($entries as $k => $v) {
        $trans[$k] = trans($v);
    }
    $trans[$filename] = trans($filename);
    echo json_encode($trans);
    ?>;
</script>
</body>

</html>
