@extends('layouts.panitia')

@section('page-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h4 class="judul ml-2" style="font-weight: 600;">Verifikasi <small style="font-size: 12px; color: #777;">Sidang</small></h3>
  </div>
</div>
@endsection

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
                        <th>Nama Mahasiswa</th>
                        <th width="20%" style="text-align: center;">NIM</th>
                        <th width="20%" style="text-align: center;">Form Sudah Upload</th>
                        <th width="20%" style="text-align: center;">Form Belum Verif</th>
                        <th width="15%" style="text-align: center;">Status</th>
                        <th width="10%" style="text-align: center;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @for($i=0; $i < count($sidang); $i++)
                      <tr>
                        <td style="text-align: center;">{{$i + 1}}</td>
                        <td>{{$sidang[$i][1]}}</td>
                        <td style="text-align: center;">{{$sidang[$i][2]}}</td>
                        <td style="text-align: center;">{{$sidang[$i][3]}}</td>
                        <td style="text-align: center;">{{$sidang[$i][4]}}</td>
                        
                        @if ($sidang[$i][5] == 0)
                          <td></td>
                        @else
                          <td style="text-align: center;">Sidang Ulang</td>
                        @endif
                        <td><a href="{{route('sidang-vf', $sidang[$i][0])}}" title="Verifikasi Form" type="button" class="btn btn-success btn-sm">Verifikasi</a></td>
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
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>
@endpush