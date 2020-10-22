<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bimbingan Online</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('sidebar/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css')}}">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    @yield('css')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('dataTables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dataTables/css/dataTables.rowReorder.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dataTables/css/dataTables.responsive.min.css') }}">
    <!-- End DataTables -->

    <link rel="stylesheet" href="{{ asset('css/cs-skin-elastic.css') }}">

    <!-- Custom styles for this template -->
    <link href="{{ asset('sidebar/css/simple-sidebar.css') }}" rel="stylesheet">

</head>

@yield('style')
<style>
    .bg-color {
        background-color: #757575;
        color: #fff;
    }

    body {
        font-family: calibri;
    }

</style>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right bg-color" id="sidebar-wrapper">

            <div class="list-group list-group-flush">
                <center>
                    <a class="list-group-item bg-color"><i class="fa fa-user-circle" style="font-size: 50px;"></i>
                        <h6 style="margin-top: 10px;"> {{ Auth::user()->name }}</h6>

                    </a>
                </center>
                <a href="{{ route('dosen.index') }}" class="list-group-item list-group-item-action bg-color"><i
                        class="fa fa-user-circle"></i> Dosen</a>
                <a href="{{ route('mahasiswa.index') }}" class="list-group-item list-group-item-action bg-color"><i
                        class="fa fa-user"></i> Mahasiswa</a>

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <aside id="left-panel" class="left-panel">
                <nav class="navbar navbar-expand-lg navbar-light bg-color border-bottom">
                    <a class="" id="menu-toggle" style="cursor:pointer;"><i class="fa fa-bars"></i></a>
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

                        <div class="dropdown for-message">
                            <a class="btn btn-secodary logout bg-color" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-power-off"
                                    style="font-size:20px"></i></a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>

                    </ul>
                </nav>
            </aside>

            <!-- Succes Create -->
            @if(session()->has('success-create'))
            <div class="row-md-5">
                <div class="alert alert-success">
                    <center>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            &times;
                        </button>
                        {{ session()->get('success-create') }}
                    </center>
                </div>
            </div>
            @endif

            <!-- Succes Edit -->
            @if(session()->has('success-edit'))
            <div class="row-md-5">
                <div class="alert alert-success">
                    <center>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            &times;
                        </button>
                        {{ session()->get('success-edit') }}
                    </center>
                </div>
            </div>
            @endif

            <div class="content">
                <div class="animated fadeIn">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <div class="clearfix"></div>
    <footer class="site-footer">
        <div class="footer-inner">
            <div class="row">
                <div class="col-sm-12 text-center">
                    Copyright &copy; 2019 Muhamad Gin-gin Fauzal Ghani <font color="green">Support By</font> Compunerd
                    Studio
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('sidebar/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sidebar/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <!-- Sweetalert -->
    <script src="{{ asset('sweetalert/dist/sweetalert2.all.min.js') }}"></script>
    <!-- End SweetAlert -->

    <!-- DataTables -->
    <script src="{{ asset('dataTables/js/jquery.dataTables.min.js') }}"></script>
    <!-- <script src="{{ asset('dataTables/js/dataTables.rowReorder.min.js') }}"></script> -->
    <script src="{{ asset('dataTables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/jquery.chained.min.js') }}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
    <!-- End DataTables -->




    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    </script>

    <script type="text/javascript">
        $(".myselect").select2();

    </script>



    <script type="text/javascript">
        $(document).ready(function () {
            $('#myTable').DataTable({

                //     "rowReorder": {
                //     "selector": 'td:nth-child(2)'
                // },
                // "responsive": true,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Semua"]
                ],

                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
                    "sEmptyTable": "Tidak ada data di database",
                }


            });
        });

    </script>

    @yield('js')

</body>

</html>
