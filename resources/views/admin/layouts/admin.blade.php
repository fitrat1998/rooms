


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css?v=3.2.0') }}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">



    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{   asset('plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="../plugins/fullcalendar/main.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- DataTables Bootstrap 5 Integration CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">

    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>


        <!-- Sidebar -->
            @include('admin.layouts.sidebar')

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      @yield('content')

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity=""
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity=""
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- DataTables Core JavaScript -->
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<!-- DataTables Bootstrap 5 Integration -->
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>


<script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>

<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- Bootstrap 4 -->
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js?v=3.2.0')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>

<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>

<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>




<script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

<script src="{{ asset('plugins/my/self.js')}}"></script>



<script>
    $(document).ready(function () {
        $('.select2').select2({
            allowClear: true
        });

        $('.duallistbox').bootstrapDualListbox();

        $('.dataTable').DataTable({
            paging: true,
            pageLength: 10,
            responsive: true,
            dom: 'Bfrtip', // Define element placement
            buttons: [
                {
                    extend: 'copy',
                    text: 'Nusxa ko`chirish'
                },
                {
                    extend: 'csv',
                    text: 'CSV'
                },
                {
                    extend: 'excel',
                    text: 'Excel'
                },
                {
                    extend: 'print',
                    text: 'Chop etish'
                }
            ],
            scrollY: '50vh',
            scrollCollapse: true,
            scrollX: true,
            language: {
                "sEmptyTable": "Ma'lumotlar mavjud emas",
                "sInfo": "_START_ dan _END_ gacha _TOTAL_ ta yozuv",
                "sInfoEmpty": "0 dan 0 gacha 0 ta yozuv",
                "sInfoFiltered": "(filtrlangan _MAX_ ta yozuvdan)",
                "sLengthMenu": "_MENU_ ta yozuv ko'rsatish",
                "sLoadingRecords": "Yuklanmoqda...",
                "sProcessing": "Qayta ishlanmoqda...",
                "sSearch": "Qidirish:",
                "sZeroRecords": "Hech qanday mos yozuv topilmadi",
                "oPaginate": {
                    "sFirst": "Birinchisi",
                    "sLast": "Oxirgi",
                    "sNext": "Keyingisi",
                    "sPrevious": "Oldingisi"
                },
                "oAria": {
                    "sSortAscending": ": ortacha tartiblash uchun boshing",
                    "sSortDescending": ": kamayish tartiblash uchun boshing"
                }
            }
        });

    });
</script>


@if(session('success'))
    <script>
        $(function () {
            toastr.success("{{ session('success') }}");
        });
    </script>
@elseif(session('danger'))
    <script>
        $(function () {
            toastr.error("{{ session('danger') }}");
        });
    </script>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>

<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("card");
        if (x.style.display === "block") {
            x.style.display = "none";
            console.log(1111);
        } else {
            x.style.display = "block";
            console.log(2222);
        }
    }
</script>


<script>
    $(document).ready(function () {
        $('#building').change(function () {
            var currentFloorId = {{ isset($room) && $room->floor ? $room->floor->id : 'null' }};

            var buildingId = $(this).val();
            var url = '{{ route("buildings.show", ":id") }}';
            url = url.replace(':id', buildingId);

            if (buildingId) {
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function (data) {
                        console.log(data); // Ma'lumotlarni konsolga chiqarish
                        $('#floors').empty();
                        $('#floors').append('<option value="">Qavatni tanlang</option>');
                        $.each(data, function (key, floor) {
                            var selected = floor.id == currentFloorId ? 'selected' : '';
                            $('#floors').append('<option value="' + floor.id + '" ' + selected + '>' + floor.number + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error: " + status + error);
                    }
                });
            } else {
                $('#floors').empty();
                $('#floors').append('<option value="">Avval binoni tanlang</option>');
            }


        });
    });
</script>


<script>
    $(document).ready(function () {
        // Handle visa period toggle
        $('input[name="visa"]').change(function () {
            if ($('#visa_yes').is(':checked')) {
                $('#visa_period_group').show();
                $('input[name="visa_start"], input[name="visa_end"]').datepicker({
                    dateFormat: 'dd-mm-yy'
                });
            } else {
                $('#visa_period_group').hide();
            }
        });

        // Handle registration period toggle
        $('input[name="reg"]').change(function () {
            if ($('#reg_yes').is(':checked')) {
                $('#reg_period_group').show();
                $('input[name="reg_start"], input[name="reg_end"]').datepicker({
                    dateFormat: 'dd-mm-yy'
                });
            } else {
                $('#reg_period_group').hide();
            }
        });

        // Ensure the correct state on page load if old value is set
        if ($('#visa_yes').is(':checked')) {
            $('#visa_period_group').show();
            $('input[name="visa_start"], input[name="visa_end"]').datepicker({
                dateFormat: 'dd-mm-yy'
            });
        } else {
            $('#visa_period_group').hide();
        }

        if ($('#reg_yes').is(':checked')) {
            $('#reg_period_group').show();
            $('input[name="reg_start"], input[name="reg_end"]').datepicker({
                dateFormat: 'dd-mm-yy'
            });
        } else {
            $('#reg_period_group').hide();
        }
    });


    $(document).ready(function () {
        $('#arrive').datepicker({
            dateFormat: 'dd-mm-yy'
        });

        $('#leave').datepicker({
            dateFormat: 'dd-mm-yy'
        });
    });


</script>

<script>
    $(document).ready(function () {
        $('.select2').select2({
            allowClear: true
        });

        $('#building').on('change', function () {
            var buildingId = $(this).val();
            if (buildingId) {
                $.ajax({
                    url: '/floors/' + buildingId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#floor').empty();
                        $('#floor').append('<option value="">Qavatni tanlang</option>');
                        $.each(data, function (key, value) {
                            $('#floor').append('<option value="' + value.id + '">' + value.number + ' qavat</option>');
                        });
                        $('#floor').trigger('change');
                    }
                });
            } else {
                $('#floor').empty();
                $('#floor').append('<option value="">Avval binoni tanlang</option>');
            }
        });

        $('#floor').on('change', function () {
            var floorId = $(this).val();
            if (floorId) {
                $.ajax({
                    url: '/rooms/getrooms/' + floorId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {

                        var table = $('#roomtable').DataTable();

                        table.clear().draw();
                        $.each(data, function (key, room) {
                            table.row.add([
                                '<span>' + room.id + '</span>',
                                '<span class="btn btn-success">' + room.number + '</span>',
                                '<span class="btn btn-success">' + room.beds.length + '</span>',
                                '<span class="btn btn-success">' + room.floor.number + '</span>',
                                '<span class="btn btn-success">' + room.floor.building.name + '</span>',
                                '<span>' + room.comment + '</span>',

                                '<a href="/rooms/' + room.id + '/edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> ' +
                                '<form action="/rooms/' + room.id + '" method="post" style="display:inline">@csrf<input name="_method" type="hidden" value="DELETE"><button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Вы уверены?\');"><i class="fa fa-trash"></i></button></form>'
                            ]).draw();
                        });
                    }
                });
            } else {
                $('#rooms-table-body').empty();
            }
        });


        $('.roomtable').DataTable({
            paging: true, // Paginatsiyani yoqish
            pageLength: 10, // Har sahifada qancha yozuv ko‘rsatish
            language: {
                "sEmptyTable": "Ma'lumotlar mavjud emas",
                "sInfo": "_START_ dan _END_ gacha _TOTAL_ ta yozuv",
                "sInfoEmpty": "0 dan 0 gacha 0 ta yozuv",
                "sInfoFiltered": "(filtrlangan _MAX_ ta yozuvdan)",
                "sLengthMenu": "_MENU_ ta yozuv ko'rsatish",
                "sLoadingRecords": "Yuklanmoqda...",
                "sProcessing": "Qayta ishlanmoqda...",
                "sSearch": "Qidirish:",
                "sZeroRecords": "Hech qanday mos yozuv topilmadi",
                "oPaginate": {
                    "sFirst": "Birinchisi",
                    "sLast": "Oxirgi",
                    "sNext": "Keyingisi",
                    "sPrevious": "Oldingisi"
                },
                "oAria": {
                    "sSortAscending": ": ortacha tartiblash uchun boshing",
                    "sSortDescending": ": kamayish tartiblash uchun boshing"
                }
            }
        });

    });


</script>




</body>
</html>

