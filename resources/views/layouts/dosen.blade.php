<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Dashboard | Dosen</title>
  <link rel="icon" href="{{ url('images/logo-form2.jpg') }}" sizes="32x32">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{ asset('css/quicksand.css') }}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('admin_asset/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin_asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admin_asset/plugins/select2/css/select2.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admin_asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.css') }}">
  <!-- datepicker -->
  <link rel="stylesheet" href="{{ asset('bootstrap-spacex/assets/plugin/datepicker/css/bootstrap-datepicker.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin_asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin_asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin_asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/adminlte.min.css') }}">
  <!-- dropify -->
  <link rel="stylesheet" href="{{asset('bootstrap-spacex/assets/plugin/dropify/css/dropify.min.css')}}">
  <!-- Signature -->
  <link rel="stylesheet" href="{{asset('css/jquery.signature.css')}}">
  <!-- Custom Css -->
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="font-family:'Quicksand'; color: rgba(0,0,0,.87);">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto" style="margin-right: 10px;">
        <li class="dropdown navbar-user">
          <a class="dropdown-toggle" data-toggle="dropdown" style="font-size: 14px; font-weight: 600;">
            @foreach($datas as $data)
            <span class="text-dark">{{$data->nama}}</span>
            @endforeach
          </a>
          <ul class="dropdown-menu">
            <li style="text-decoration: none; font-size: 12px; border-bottom: 1px solid black; padding: 10px 10px 10px;"><a href="{{ route('reset-d') }}" style="color: black;"><i class="fas fa-lock fa-sm"></i> &nbsp;Change Password</a></li>
            <li style="text-decoration: none; font-size: 12px; padding: 10px 10px 10px; ">
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: black;"><i class="fas fa-power-off fa-sm"></i> &nbsp;Log Out</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-secondary elevation-4">
      <!-- Brand Logo -->
      <div class="brand-link" style="text-align: center;">
        <b class="brand-text" style="font-size: 17px;">Web PKL SV IPB</b>
      </div>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header" style="font-size: 11px; color: #999;">Navigation <i class="fa fa-paper-plane m-l-5"></i></li>
            <li class="nav-item">
              <a href="{{ route('dashboard-d') }}" class="nav-link {{ Route::currentRouteNamed('dashboard-d') ? 'active' : '' }}">
                <i class="nav-icon fa fa-id-card"></i>
                <p style="padding-left: 7px;">
                  Dashboard
                  <span class="right badge badge-primary">HOME</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('biodata-d') }}" class="nav-link {{ Route::currentRouteNamed('biodata-d') ? 'active' : '' }}">
                <i class="nav-icon fa fa-user"></i>
                <p style="padding-left: 7px;">
                  Biodata
                </p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="{{ route('form-kesediaan') }}" class="nav-link {{ Route::currentRouteNamed('form-kesediaan') ? 'active' : '' }}">
            <i class="nav-icon fa fa-window-restore"></i>
            <p style="padding-left: 7px;">
              Form Kesediaan
            </p>
            </a>
            </li> --}}
            <li class="nav-item">
              <a href="{{ route('form-ttd') }}" class="nav-link {{ Route::currentRouteNamed('form-ttd') ? 'active' : '' }}">
                <i class="nav-icon fa fa-pen"></i>
                <p style="padding-left: 7px;">
                  Tanda Tangan Form
                </p>
              </a>
            </li>
            <li class="nav-item @if(Route::currentRouteNamed('d-jurnal-harian')) menu-open @elseif(Route::currentRouteNamed('d-kartu-bimbingan')) menu-open @elseif(Route::currentRouteNamed('d-ttd-kaprodi')) menu-open @elseif(Route::currentRouteNamed('d-laporan-periodik')) menu-open @else '' @endif">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-folder" style="border-radius: 4px;"></i>
                <p style="padding-left: 7px;">
                  Form Daily
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('d-jurnal-harian')}}" class="nav-link {{ Route::currentRouteNamed('d-jurnal-harian') ? 'active' : '' }}">
                    <i class="far fa-circle ml-4 nav-icon" style="font-size: small;"></i>
                    <p>Jurnal Harian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('d-laporan-periodik')}}" class="nav-link {{ Route::currentRouteNamed('d-laporan-periodik') ? 'active' : '' }}">
                    <i class="far fa-circle ml-4 nav-icon" style="font-size: small;"></i>
                    <p>Laporan Periodik</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('d-kartu-bimbingan')}}" class="nav-link {{ Route::currentRouteNamed('d-kartu-bimbingan') ? 'active' : '' }}">
                    <i class="far fa-circle ml-4 nav-icon" style="font-size: small;"></i>
                    <p>Kartu Bimbingan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('d-ttd-kaprodi')}}" class="nav-link {{ Route::currentRouteNamed('d-ttd-kaprodi') ? 'active' : '' }}">
                    <i class="far fa-circle ml-4 nav-icon" style="font-size: small;"></i>
                    <p>TTD Kaprodi</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item @if(Route::currentRouteNamed('kolokium-d')) menu-open @elseif(Route::currentRouteNamed('kolokium-m')) menu-open @elseif(Route::currentRouteNamed('kl-bap-d')) menu-open @elseif(Route::currentRouteNamed('kl-bap-ed')) menu-open @elseif(Route::currentRouteNamed('kl-bap-m')) menu-open @elseif(Route::currentRouteNamed('kl-bap-em')) menu-open @else '' @endif">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-calendar" style="border-radius: 4px;"></i>
                <p style="padding-left: 7px;">
                  Kolokium
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('kolokium-d')}}" class="nav-link @if(Route::currentRouteNamed('kolokium-d')) active @elseif(Route::currentRouteNamed('kl-bap-d')) active @elseif(Route::currentRouteNamed('kl-bap-ed')) active @else '' @endif">
                    <i class="far fa-circle ml-4 nav-icon" style="font-size: small;"></i>
                    <p>Pembimbing</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('kolokium-m')}}" class="nav-link @if(Route::currentRouteNamed('kolokium-m')) active @elseif(Route::currentRouteNamed('kl-bap-m')) active @elseif(Route::currentRouteNamed('kl-bap-em')) active @else '' @endif">
                    <i class="far fa-circle ml-4 nav-icon" style="font-size: small;"></i>
                    <p>Moderator</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item @if(Route::currentRouteNamed('list-form-004')) menu-open @elseif(Route::currentRouteNamed('list-form-015')) menu-open @elseif(Route::currentRouteNamed('input-form-015')) menu-open @elseif(Route::currentRouteNamed('input-form-004')) menu-open @else '' @endif">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-building" style="border-radius: 4px;"></i>
                <p style="padding-left: 7px;">
                  Supervisi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('list-form-004')}}" class="nav-link @if(Route::currentRouteNamed('list-form-004')) active @elseif(Route::currentRouteNamed('input-form-004')) active @else '' @endif">
                    <i class="far fa-circle ml-4 nav-icon" style="font-size: small;"></i>
                    <p>Form 004</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('list-form-015')}}" class="nav-link @if(Route::currentRouteNamed('list-form-015')) active @elseif(Route::currentRouteNamed('input-form-015')) active @else '' @endif">
                    <i class="far fa-circle ml-4 nav-icon" style="font-size: small;"></i>
                    <p>Form 015</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item @if(Route::currentRouteNamed('seminar-d')) menu-open @elseif(Route::currentRouteNamed('seminar-m')) menu-open @elseif(Route::currentRouteNamed('sm-bap-d')) menu-open @elseif(Route::currentRouteNamed('sm-bap-ed')) menu-open @elseif(Route::currentRouteNamed('sm-bap-m')) menu-open @elseif(Route::currentRouteNamed('sm-bap-em')) menu-open @else '' @endif">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-laptop" style="border-radius: 4px;"></i>
                <p style="padding-left: 7px;">
                  Seminar
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('seminar-d')}}" class="nav-link @if(Route::currentRouteNamed('seminar-d')) active @elseif(Route::currentRouteNamed('sm-bap-d')) active @elseif(Route::currentRouteNamed('sm-bap-ed')) active @else '' @endif">
                    <i class="far fa-circle ml-4 nav-icon" style="font-size: small;"></i>
                    <p>Pembimbing</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('seminar-m')}}" class="nav-link @if(Route::currentRouteNamed('seminar-m')) active @elseif(Route::currentRouteNamed('sm-bap-m')) active @elseif(Route::currentRouteNamed('sm-bap-em')) active @else '' @endif">
                    <i class="far fa-circle ml-4 nav-icon" style="font-size: small;"></i>
                    <p>Moderator</p>
                  </a>
                </li>
              </ul>
            </li>
            {{-- <li class="nav-item @if(Route::currentRouteNamed('sidang-d')) menu-open @elseif(Route::currentRouteNamed('sidang-j')) menu-open @elseif(Route::currentRouteNamed('sd-bap-du')) menu-open @elseif(Route::currentRouteNamed('sd-bap-ju')) menu-open @elseif(Route::currentRouteNamed('sd-bap-ed')) menu-open @elseif(Route::currentRouteNamed('sd-bap-j')) menu-open @elseif(Route::currentRouteNamed('sd-bap-ej')) menu-open @elseif(Route::currentRouteNamed('sd-bap-edu')) menu-open @elseif(Route::currentRouteNamed('sd-bap-eju')) menu-open @else '' @endif">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-book-open" style="border-radius: 4px;"></i>
                <p style="padding-left: 7px;">
                  Sidang
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('sidang-d')}}" class="nav-link @if(Route::currentRouteNamed('sidang-d')) active @elseif(Route::currentRouteNamed('sd-bap-du')) active @elseif(Route::currentRouteNamed('sd-bap-ed')) active @elseif(Route::currentRouteNamed('sd-bap-edu')) active @else '' @endif">
            <i class="far fa-circle ml-4 nav-icon" style="font-size: small;"></i>
            <p>Pembimbing</p>
            </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('sidang-j')}}" class="nav-link @if(Route::currentRouteNamed('sidang-j')) active @elseif(Route::currentRouteNamed('sd-bap-ju')) active @elseif(Route::currentRouteNamed('sd-bap-ej')) active @elseif(Route::currentRouteNamed('sd-bap-eju')) active @else '' @endif">
                <i class="far fa-circle ml-4 nav-icon" style="font-size: small;"></i>
                <p>Penguji</p>
              </a>
            </li>
          </ul>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p style="padding-left: 7px;">
                Logout
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">

          @yield('page-header')

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      @yield('content')

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer" style="font-size: 12px;">
      <strong>Copyright &copy; 2021 <a href="#">IPB University</a>.</strong>
      All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="{{ asset('admin_asset/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('admin_asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('admin_asset/dist/js/adminlte.js') }}"></script>

  <!-- PAGE PLUGINS -->
  <!-- Select2 -->
  <script src="{{ asset('admin_asset/plugins/select2/js/select2.full.min.js') }}"></script>
  <!-- Datepicker -->
  <script src="{{ asset('bootstrap-spacex/assets/plugin/datepicker/js/bootstrap-datepicker.js') }}"></script>
  <!-- jQuery Mapael -->
  <script src="{{ asset('admin_asset/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
  <script src="{{ asset('admin_asset/plugins/raphael/raphael.min.js') }}"></script>
  <script src="{{ asset('admin_asset/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
  <script src="{{ asset('admin_asset/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('admin_asset/plugins/chart.js/Chart.min.js') }}"></script>
  <!-- DataTables  & Plugins -->
  <script src="{{ asset('admin_asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin_asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin_asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('admin_asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin_asset/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('admin_asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin_asset/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('admin_asset/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('admin_asset/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('admin_asset/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('admin_asset/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('admin_asset/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <!-- Dropify -->
  <script src="{{asset('bootstrap-spacex/assets/plugin/dropify/js/dropify.min.js')}}"></script>
  <script src="{{asset('bootstrap-spacex/assets/scripts/fileUpload.demo.min.js')}}"></script>
  <!-- Signature -->
  <script src="{{asset('js/jquery-ui.min.js')}}"></script>
  <script src="{{asset('js/jquery.signature.js')}}"></script>


  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('admin_asset/dist/js/demo.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('admin_asset/dist/js/pages/dashboard2.js') }}"></script>

  <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(200, 0).slideUp(200, function() {
        $(this).remove();
      });
    }, 7000);
  </script>

  @stack('scripts')
</body>

</html>