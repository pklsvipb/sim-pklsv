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
                    <p class="badge badge-primary p-2" style="font-size: 13px;">JURNAL HARIAN MAHASISWA</p>
                  </div>
                  <table id="datatable1" class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline collapsed" style="font-size: 12px; font-weight: 400; color: black; width: 100%;" width="100%" role="grid" aria-describedby="data-table_info">
                    <thead>
                      <th width="5%">No</th>
                      <th width="40%">Nama</th>
                      <th>NIM</th>
                      <th>Status</th>
                      <th width="10%" style="text-align: center;">Aksi</th>
                      <th width="10%" style="text-align: center;">File Upload</th>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      @for ($i=0; $i < count($getmhs); $i++) <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $getmhs[$i][2] }}</td>
                        <td>{{ $getmhs[$i][3] }}</td>
                        <td>
                          @if($getmhs[$i][0] == 1)
                          <span class="badge badge-primary badge-sm">Bimbingan Utama</span>
                          @else
                          <span class="badge badge-warning badge-sm">Pembimbing Kedua</span>
                          @endif
                        </td>
                        <td style="text-align: center;">
                          <a data-toggle="modal" class="btn btn-success btn-sm" data-target="#Status-{{$getmhs[$i][1]}}" title="Status Mahasiswa" type="button"><i class="fas fa-search"></i> Detail</a>
                        </td>
                        <td style="text-align: center;">
                          @if (File::exists(public_path('pdf/'.$getmhs[$i][3].'/pdf_jurnal_harian.pdf')))
                          <a href="{{ asset('pdf/'.$getmhs[$i][3].'/pdf_jurnal_harian.pdf') }}" class="btn btn-danger btn-sm" download="Jurnal_Harian_{{$getmhs[$i][2]}}_{{$getmhs[$i][3]}}.pdf" style="text-decoration: none; text-align:center;"><i class="fas fa-file-pdf fa-sm"></i> PDF</a>
                          @else
                          (empty)
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
@include('modal.jurnal-status-d') 
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