<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Base Css Files -->
        <link href="{{ asset('common_files/css/bootstrap.min.css') }}" rel="stylesheet" />
    
        <!-- Font Icons -->
        <link href="{{ asset('common_files/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('common_files/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('common_files/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    
        <!-- animate css -->
        <link href="{{ asset('common_files/css/animate.css') }}" rel="stylesheet" />
    
        <!-- Waves-effect -->
        <link href="{{ asset('common_files/css/waves-effect.css') }}" rel="stylesheet">
    
        <!-- sweet alerts -->
        {{-- <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet"> --}}
    
        <!-- Custom Files -->
        <link href="{{ asset('common_files/css/helper.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('common_files/css/style.css') }}" rel="stylesheet" type="text/css" />
    
        <!-- Scripts -->
        <script src="{{ asset('common_files/js/modernizr.min.js') }}"></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    
        <!--calendar css-->
        <link href="{{ asset('common_files/assets/fullcalendar/fullcalendar.css') }}" rel="stylesheet" />
        <link href="{{ asset('common_files/assets/select2/select2.css') }}" rel="stylesheet" type="text/css" />
    
        {{-- TOASTR MESSAGE ALERT START HERE --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
        {{-- TOASTR MESSAGE ALERT END HERE --}}

        <!-- DataTables -->
        <link href="{{ asset('common_files/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Styles -->
        
    </head>
<body class="fixed-left">   
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Authentication Links -->
        @guest
            
        @else
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><i class="md md-terrain"></i> <span>Moltran </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification</li>
                                        <li class="list-group">
                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New user registered</div>
                                                    <p class="m-0">
                                                       <small>You have 10 unread messages</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                           <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New settings</div>
                                                    <p class="m-0">
                                                       <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">Updates</div>
                                                    <p class="m-0">
                                                       <small>There are
                                                          <span class="text-primary">2</span> new updates available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                           <!-- last list item -->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <small>See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ URL::to('common_files/images/avatar-1.jpg') }}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>

                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="md md-settings-power"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul>
                        <li>
                            <a class="{{ Route::is('home') ? 'active' : '' }} waves-effect"  href="{{ route('home') }}"><i class="md md-home"></i><span> Dashboard </span></a>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-mail"></i><span> Posts </span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a class="{{ Route::is('posts.create') ? 'active' : '' }} waves-effect" href="{{ route('posts.create') }}">Create</a></li>
                                <li><a class="{{ Route::is('posts.show') ? 'active' : '' }} waves-effect" href="{{ route('posts.show') }}">All Post</a></li>
                                <li><a href="email-read.html">View Mail</a></li>
                            </ul>
                        </li>

                        <li>
                            <a class="{{ Route::is('calendar') ? 'active' : '' }} waves-effect" href="{{ route('calendar') }}"><i class="md md-event"></i><span> Calendar </span></a>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Form </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                @can('page-view')
                                <li><a class="{{ Route::is('form.create') ? 'active' : '' }} waves-effect" href="{{ route('form.create') }}">Create</a></li>
                                @endcan
                                <li><a class="{{ Route::is('form.show') ? 'active' : '' }} waves-effect" href="{{ route('form.show') }}">Show</a></li>
                                <li><a href="panels.html">Panels</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-invert-colors-on"></i><span> Components </span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="grid.html">Grid</a></li>
                                <li><a href="portlets.html">Portlets</a></li>
                                <li><a href="widgets.html">Widgets</a></li>
                                <li><a href="nestable-list.html">Nesteble</a></li>
                                <li><a href="ui-sliders.html">Sliders </a></li>
                                <li><a href="gallery.html">Gallery </a></li>
                                <li><a href="pricing.html">Pricing Table </a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-redeem"></i> <span> Icons </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="material-icon.html">Material Design</a></li>
                                <li><a href="ion-icons.html">Ion Icons</a></li>
                                <li><a href="font-awesome.html">Font awesome</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-now-widgets"></i><span> Forms </span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="form-elements.html">General Elements</a></li>
                                <li><a href="form-validation.html">Form Validation</a></li>
                                <li><a href="form-advanced.html">Advanced Form</a></li>
                                <li><a href="form-wizard.html">Form Wizard</a></li>
                                <li><a href="form-editor.html">WYSIWYG Editor</a></li>
                                <li><a href="code-editor.html">Code Editors</a></li>
                                <li><a href="form-uploads.html">Multiple File Upload</a></li>
                                <li><a href="form-xeditable.html">X-editable</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-view-list"></i><span> Data Tables </span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="tables.html">Basic Tables</a></li>
                                <li><a href="table-datatable.html">Data Table</a></li>
                                <li><a href="tables-editable.html">Editable Table</a></li>
                                <li><a href="responsive-table.html">Responsive Table</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-poll"></i><span> Charts </span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="morris-chart.html">Morris Chart</a></li>
                                <li><a href="chartjs.html">Chartjs</a></li>
                                <li><a href="flot-chart.html">Flot Chart</a></li>
                                <li><a href="peity-chart.html">Peity Charts</a></li>
                                <li><a href="charts-sparkline.html">Sparkline Charts</a></li>
                                <li><a href="chart-radial.html">Radial charts</a></li>
                                <li><a href="other-chart.html">Other Chart</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-place"></i><span> Maps </span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="gmap.html"> Google Map</a></li>
                                <li><a href="vector-map.html"> Vector Map</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-pages"></i><span> Pages </span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="timeline.html">Timeline</a></li>
                                <li><a href="invoice.html">Invoice</a></li>
                                <li><a href="email-template.html">Email template</a></li>
                                <li><a href="contact.html">Contact-list</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="register.html">Register</a></li>
                                <li><a href="recoverpw.html">Recover Password</a></li>
                                <li><a href="lock-screen.html">Lock Screen</a></li>
                                <li><a href="blank.html">Blank Page</a></li>
                                <li><a href="maintenance.html">Maintenance</a></li>
                                <li><a href="coming-soon.html">Coming-soon</a></li>
                                <li><a href="404.html">404 Error</a></li>
                                <li><a href="404_alt.html">404 alt</a></li>
                                <li><a href="500.html">500 Error</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="md md-share"></i><span>Multi Level </span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul>
                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><span>Menu Level 1.1</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                    <ul style="">
                                        <li><a href="javascript:void(0);"><span>Menu Level 2.1</span></a></li>
                                        <li><a href="javascript:void(0);"><span>Menu Level 2.2</span></a></li>
                                        <li><a href="javascript:void(0);"><span>Menu Level 2.3</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><span>Menu Level 1.2</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Left Sidebar End -->
        @endguest

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="footer text-right">
            2022 © Moltran.
        </footer>
    </div>

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{ asset('common_files/js/jquery.min.js') }}"></script>
    <script src="{{ asset('common_files/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('common_files/js/waves.js') }}"></script>
    <script src="{{ asset('common_files/js/wow.min.js') }}"></script>
    <script src="{{ asset('common_files/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('common_files/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('common_files/assets/chat/moment-2.2.1.js') }}"></script>
    <script src="{{ asset('common_files/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('common_files/assets/jquery-detectmobile/detect.js') }}"></script>
    <script src="{{ asset('common_files/assets/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('common_files/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('common_files/assets/jquery-blockui/jquery.blockUI.js') }}"></script>

    <!-- sweet alerts -->
    <script src="{{ asset('common_files/assets/sweet-alert/sweet-alert.min.js') }}"></script>
    <script src="{{ asset('common_files/assets/sweet-alert/sweet-alert.init.js') }}"></script>

    <!-- flot Chart -->
    <script src="{{ asset('common_files/assets/flot-chart/jquery.flot.js') }}"></script>
    <script src="{{ asset('common_files/assets/flot-chart/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('common_files/assets/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('common_files/assets/flot-chart/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('common_files/assets/flot-chart/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('common_files/assets/flot-chart/jquery.flot.selection.js') }}"></script>
    <script src="{{ asset('common_files/assets/flot-chart/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('common_files/assets/flot-chart/jquery.flot.crosshair.js') }}"></script>

    <!-- Counter-up -->
    <script src="{{ asset('common_files/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('common_files/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
    
    <!-- CUSTOM JS -->
    <script src="{{ asset('common_files/js/jquery.app.js') }}"></script>

    <!-- Dashboard -->
    <script src="{{ asset('common_files/js/jquery.dashboard.js') }}"></script>

    <!-- Chat -->
    <script src="{{ asset('common_files/js/jquery.chat.js') }}"></script>

    <!-- Todo -->
    <script src="{{ asset('common_files/js/jquery.todo.js') }}"></script>

    <script src="{{ asset('common_files/js/jquery-ui-1.10.1.custom.min.js') }}"></script>
    <script src="{{ asset('common_files/assets/select2/select2.min.js') }}" type="text/javascript"></script>

    <!-- BEGIN PAGE SCRIPTS -->
    <script src="{{ asset('common_files/assets/fullcalendar/moment.min.js') }}"></script>
    <script src="{{ asset('common_files/assets/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('common_files/assets/fullcalendar/fullcalendar.js') }}"></script>

    <script type="text/javascript">
        /* ==============================================
        Counter Up
        =============================================== */
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
        });
    </script>

    {{-- TOASTR MESSAGE ALERT START HERE --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- TOASTR MESSAGE ALERT END HERE --}}

    {{-- DELETE MESSAGE SWEETALERT START HERE --}}
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js') }}"></script>
    {{-- DELETE MESSAGE SWEETALERT START HERE --}}

    {{-- TOASTR MESSAGE ALERT START HERE --}}
    <script type="text/javascript">
        @if(Session::has('messege'))
        var type="{{ Session::get('alert-type','info') }}";
        // alert(type);
        switch(type){
            case 'info':
                toastr.info('{{ Session::get('messege') }}');
                break;
            case 'success':
                toastr.success('{{ Session::get('messege') }}');
                break;
            case 'warning':
                toastr.warning('{{ Session::get('messege') }}');
                break;
            case 'error':
                toastr.error('{{ Session::get('messege') }}');
                break;
        }
        @endif
    </script>
    {{-- TOASTR MESSAGE ALERT END HERE --}}

    {{-- DELETE MESSAGE SWEETALERT START HERE --}}
    <script>
        $(document).on("click", "#delete", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Are your want to delete?",
                text: "Once delete, this will be permanently delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete)=>{
                if (willDelete) {
                    window.location.href=link;
                }else{
                    swal("Safe Data!");
                }
            });
        });
    </script>
    {{-- DELETE MESSAGE SWEETALERT END HERE --}}

    {{-- DdataTables start HERE --}}
    <script src="{{ asset('common_files/assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('common_files/assets/datatables/dataTables.bootstrap.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        } );
    </script>
    {{-- DdataTables end HERE --}}
</body>
</html>
