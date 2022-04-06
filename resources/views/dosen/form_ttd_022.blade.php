@extends('layouts.dosen')

@section('page-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h4 class="judul ml-2" style="font-weight: 600;">Request Tanda Tangan Form 022 <small style="font-size: 12px; color: #777;"></small></h3>
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
          <h1 class="card-title" style="font-weight: 600; font-size: 1.2rem;">Form 022 Persetujuan Ujian Akhir<small style="font-size: 12px; color: #777;"> Tanda Tangan Dosen Pembimbing</small></h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" style="font-size: 12px; color: #333; clear: both;">
            <div class="row">
              <div class="col-sm-12">
                <div class="">
                  <table id="datatable1" class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline collapsed" style="font-size: 12px; font-weight: 400; color: black; width: 100%;" width="100%" role="grid" aria-describedby="data-table_info">
                    <thead>
                      <tr>
                        <th width="5%">No</th>
                        <th width="30%" style="text-align: center;">Nama Mahasiswa</th>
                        <th width="10%" style="text-align: center;">NIM</th>
                        <th width="25%" style="text-align: center;">Program Studi</th>
                        <th width="10%" style="text-align: center;">File Form</th>
                        <th width="20%" style="text-align: center;">TTD Form</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      for ($i = 0; $i < count($form); $i++) { ?>
                      <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $form[$i][6] }}</td>
                        <td>{{ $form[$i][7] }}</td>
                        <td>{{ $form[$i][5] }}</td>
                        <td>
                          <a href="{{ asset($form[$i][3]) }}" download="{{substr($form[$i][3], 4)}}" type="button" class="btn btn-info" style="font-size: 13px;"><i class="fas fa-file-pdf"></i> {{ substr($form[$i][3], 4) }}</a>
                        </td>
                        <td style="text-align: center;">
                          <form action="{{route('form-ttd-022-submit', $form[$i][0])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
                          </form>
                        </td>
                      </tr>
                      <?php $no += 1; } ?>
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