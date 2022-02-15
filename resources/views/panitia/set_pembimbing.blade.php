@extends('layouts.panitia')

@section('page-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h4 class="judul ml-2" style="font-weight: 600;">Setting <small style="font-size: 12px; color: #777;">Dosen Pembimbing</small></h3>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('set-kelompok')}}" title="set-kelompok" class="btn btn-sm btn-primary m-b-10 mr-2" style="margin-left:4px;"><i class="fa fa-cog fa-sm"></i>&nbsp; Set Kelompok Mahasiswa</a></li>
    </ol>
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
      
      {{-- <div class="card">
        <div class="card-header">
          <!-- <h5 class="card-title">Profile</h5> -->
          <h1 class="card-title" style="font-weight: 600; font-size: 1.2rem;">Data Dosen <small style="font-size: 12px; color: #777;"></small></h1>
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
                        <th width="40%">Nama Dosen</th>
                        <th style="text-align: center;">NPI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      @foreach($dosen as $dsn)
                      <tr>
                        <td style="text-align: center;">{{$no}}</td>
                        <td>{{$dsn->nama}}</td>
                        <td style="text-align: center;">{{$dsn->nip}}</td>
                      </tr>
                      <?php $no += 1; ?>
                      @endforeach
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
      </div> --}}
      <!-- /.card -->

      <div class="card">
        <div class="card-header">
          <!-- <h5 class="card-title">Profile</h5> -->
          <h1 class="card-title" style="font-weight: 600; font-size: 1.2rem;">Data Kelompok Pembimbing</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" style="font-size: 12px; color: #333; clear: both;">
            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">
                  <table id="datatable2" class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline collapsed" style="font-size: 12px; font-weight: 400; color: black; width: 100%;" width="100%" role="grid" aria-describedby="data-table_info">
                    <thead>
                      <tr>
                        <th width="2%">No</th>
                        <th width="40%">Kelompok Mahasiswa</th>
                        <th style="text-align: center;">Dosen Pembimbing 1</th>
                        <th style="text-align: center;">Dosen Pembimbing 2</th>
                        <th style="text-align: center;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      @for($i=0; $i < count($kelompok); $i++)
                      <tr>
                        <td style="text-align: center;">{{$no}}</td>
                        <td>{{$kelompok[$i][0]}}</td>
                        <td style="text-align: center;">{{$kelompok[$i][1]}}</td>
                        <td style="text-align: center;">{{$kelompok[$i][2]}}</td>
                        <td style="text-align: center;">
                          <a data-toggle="modal" data-target="#Detail-{{str_replace([' ', ',', '.', '&', '-', '(', ')'], '_', $kelompok[$i][0])}}" title="Detail Kelompok" type="button" class="btn btn-secondary btn-sm">Detail</a>
                          <a data-toggle="modal" data-target="#Set-{{str_replace([' ', ',', '.', '&', '-', '(', ')'], '_', $kelompok[$i][0])}}" title="Set Pembimbing" type="button" class="btn btn-warning btn-sm">Set Dospem</a>
                          <a href="{{ route('edit-kelompok', $kelompok[$i][0]) }}" title="Edit" type="button" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                      </tr>
                      <?php $no += 1; ?>
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
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->


  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->

@if(is_null($kelompok) == 0)
@for($j=0; $j < count($kelompok); $j++)
@include('modal.set-dospem')
@include('modal.detail-mhs')
@endfor
@endif

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
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>
@endpush