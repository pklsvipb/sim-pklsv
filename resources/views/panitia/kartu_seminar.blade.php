@extends('layouts.panitia')

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
                    <p class="badge badge-primary p-2" style="font-size: 13px;">KARTU SEMINAR MAHASISWA</p>
                  </div>
                  <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline collapsed" style="font-size: 12px; font-weight: 400; color: black; width: 100%;" width="100%" role="grid" aria-describedby="data-table_info">
                      <thead>
                        <th width="5%">No</th>
                        <th width="30%">Nama</th>
                        <th width="10%">NIM</th>
                        <th width="5%" style="text-align: center;">Kehadiran</th>
                        <th width="10%" style="text-align: center;">Aksi</th>
                        <th width="10%" style="text-align: center;">PDF</th>
                      </thead>
                      <tbody>
                        <?php $no = 1;
                        $id = 0; ?>
                        @foreach ($list as $data)
                        <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $data->getMhs->nama }}</td>
                          <td>{{ $data->getMhs->nim }}</td>
                          <td style="text-align: center;">
                            @if($mahasiswa[$id][0] == $data->id_mhs)
                            {{ count($mahasiswa[$id][1]) }}
                            @endif
                          </td>
                          <td style="text-align: center;"><a data-toggle="modal" class="btn btn-success btn-sm" data-target="#Status-{{$data->id_mhs}}" title="Status Mahasiswa" type="button"><i class="fas fa-search"></i> Detail</a></td>
                          <td style="text-align: center;">
                            <a href="{{route('download-kartu-sm-p',$data->id_mhs)}}" type="button" class="btn btn-info" style="font-size: 12px;"><i class="fa fa-download fa-sm"></i>&nbsp;Download</a>
                          </td>
                        </tr>
                        <?php $no += 1;
                        $id += 1; ?>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
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
@if(is_null($list) == 0)
@foreach($list as $data)
@include('modal.kartu-seminar-status')
@endforeach
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
@endpush