@extends('layouts.dosen')

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    @if ($message = Session::get('success'))
    <div id="messageAlert" class="alert alert-success alert-dismissible">
      <i class="fa fa-check"></i> &nbsp; {{ $message }}
    </div>
    @endif

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" style="font-size: 12px; color: #333; clear: both;">
              <div class="row">
                <div class="col-md-12">
                  <div class="row text-center">
                  </div>
                  <div class="text-center">
                    <p class="badge badge-primary p-2" style="font-size: 13px;">KARTU KENDALI PEMBIMBINGAN LAPORAN AKHIR MAHASISWA</p>
                  </div>
                  <table id="datatable1" class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline collapsed" style="font-size: 12px; font-weight: 400; color: black; width: 100%;" width="100%" role="grid" aria-describedby="data-table_info">
                    <thead>
                      <th width="5%" style="text-align: center;">No</th>
                      <th width="40%">Nama</th>
                      <th width="10%">NIM</th>
                      <th width="20%">Program Studi</th>
                      <th width="10%" style="text-align: center;">Detail</th>
                      <th width="10%" style="text-align: center;">Paraf</th>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      @for ($i=0; $i < count($getmhs); $i++) <tr>
                        <td style="text-align: center;">{{ $no }}</td>
                        <td>{{ $getmhs[$i][1] }}</td>
                        <td>{{ $getmhs[$i][2] }}</td>
                        <td>{{$getmhs[$i][3]}}</td>
                        <td style="text-align: center;">
                          <a data-toggle="modal" class="btn btn-success btn-sm" data-target="#Status-{{$getmhs[$i][0]}}" title="Status Mahasiswa" type="button"><i class="fas fa-search"></i> Detail</a>
                        </td>
                        <td style="text-align: center;">
                          @if ($getmhs[$i][4] == 1)
                          <span class="badge badge-warning">disetujui</span>
                          @elseif($getmhs[$i][4] == "")
                          <span></span>
                          @else
                          <form action="{{route('d-paraf-bimbingan', $getmhs[$i][0])}}" method="GET" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-check fa-sm"></i></button>
                          </form>
                          @endif
                        </td>
                        </tr>
                        <?php $no += 1; ?>
                        @endfor
                    </tbody>
                  </table>
                  </form>
                </div>
              </div>
            </div>
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
@if(is_null($getmhs) == 0)
@for($i=0; $i < count($getmhs); $i++) 
@include('modal.kartu-bimbingan-d') 
@endfor 
@endif 
@endsection 

@push('scripts') <script>
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
@endpush