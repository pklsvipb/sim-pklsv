@extends('layouts.panitia')

@section('page-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h4 class="judul ml-2" style="font-weight: 600;">Verifikasi <small style="font-size: 12px; color: #777;">Sidang</small></h3>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('export-sidang') }}" type="button" title="export-data" class="btn btn-sm btn-success m-b-10 mr-2" style="margin-left:4px;"><i class="fa fa-file-export fa-sm"></i>&nbsp; Export Nilai Sidang</a></li>
    </ol>
  </div>
</div>
@endsection

{{-- NEW --}}

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="col-md-12">
      @if ($message = Session::get('success'))
      <div id="messageAlert" class="alert alert-success alert-dismissible">
        <i class="fa fa-check"></i> &nbsp; {{ $message }}
      </div>
      @endif

      <div class="card">
        <div class="card-header">
          <!-- <h5 class="card-title">Profile</h5> -->
          <h1 class="card-title" style="font-weight: 600; font-size: 1.2rem;">Data <small style="font-size: 12px; color: #777;">Sidang</small></h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" style="font-size: 12px; color: #333; clear: both;">
            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">
                  <table id="datatable1" class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline collapsed" style="font-size: 12px; font-weight: 400; color: black; width: 100%;" width="100%" role="grid" aria-describedby="data-table_info">
                    <thead>
                      <tr>
                        <th width="2%">No</th>
                        <th width="20%">Nama Mahasiswa</th>
                        <th width="5%" style="text-align: center;">NIM</th>
                        <th width="5%" style="text-align: center;">Tanggal Sidang</th>
                        <th width="5%" style="text-align: center;">Waktu Sidang</th>
                        <th width="20%">Dosen Penguji</th>
                        <th width="10%">FRM Belum Verif</th>
                        <th width="10%">FRM Upload</th>
                        <th width="10%" style="text-align: center;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @for($i=0; $i < count($sidang); $i++) <tr>
                        <td style="text-align: center;">{{$i + 1}}</td>
                        <td>{{$sidang[$i][2]}}</td>
                        <td style="text-align: center;">{{$sidang[$i][3]}}</td>
                        <td style="text-align: center;">{{$sidang[$i][4]}}</td>
                        <td style="text-align: center;">{{$sidang[$i][8]}}</td>
                        <td>{{$sidang[$i][5]}}</td>
                        <th style="text-align: center;">{{$sidang[$i][7]}}</th>
                        <th style="text-align: center;">{{$sidang[$i][6]}}</th>
                        <td><a href="{{route('sidang-vf', $sidang[$i][1])}}" title="Verifikasi Form" type="button" class="btn btn-success btn-sm">Verif</a></td>
                        </tr>
                      @endfor
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.dataTables -->
        </div>
        <!-- ./card-body -->
      </div>
      <!-- /.card -->

      <div class="card">
        <div class="card-header">
          <!-- <h5 class="card-title">Profile</h5> -->
          <h1 class="card-title" style="font-weight: 600; font-size: 1.2rem;">Data <small style="font-size: 12px; color: #777;">Sidang Ulang</small></h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" style="font-size: 12px; color: #333; clear: both;">
            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">
                  <table id="datatable2" class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline collapsed" style="font-size: 12px; font-weight: 400; color: black; width: 100%;" width="100%" role="grid" aria-describedby="data-table_info">
                    <thead>
                      <tr>
                        <th width="2%">No</th>
                        <th width="30%">Nama Mahasiswa</th>
                        <th width="10%">NIM</th>
                        <th width="15%">Tanggal Sidang Ulang</th>
                        <th width="30%">Dosen Penguji</th>
                        <th width="13%" style="text-align: center;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @for($i=0; $i < count($sidang3); $i++) <tr>
                        <td style="text-align: center;">{{$i + 1}}</td>
                        <td>{{$sidang3[$i][2]}}</td>
                        <td>{{$sidang3[$i][3]}}</td>
                        <td>{{$sidang3[$i][4]}}</td>
                        <td>{{$sidang3[$i][5]}}</td>
                        <td><a href="{{route('sidang-vf', $sidang3[$i][1])}}" title="Verifikasi Form" type="button" class="btn btn-warning btn-sm">Verif</a></td>
                        </tr>
                      @endfor
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.dataTables -->
        </div>
        <!-- ./card-body -->
      </div>
      <!-- /.card -->

    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->


  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->



@endsection

@push('scripts')
<script>
  $(function() {
    $("#datatable1").DataTable({
      "responsive": true,
      "lengthChange": true,
      "aLengthMenu": [
        [5, 25, 50, 75, -1],
        [5, 25, 50, 75, "All"]
      ],
      "pageLength": 5,
      "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
  $(function() {
    $("#datatable2").DataTable({
      "responsive": true,
      "lengthChange": true,
      "aLengthMenu": [
        [5, 25, 50, 75, -1],
        [5, 25, 50, 75, "All"]
      ],
      "pageLength": 5,
      "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>
@endpush