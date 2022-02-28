@extends('layouts.panitia')

@section('page-header')
<div class="row mb-2">
  <div class="col-sm-6">
  </div>
  {{--<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a type="button" title="import-data" data-toggle="modal" data-target="#Import-Mahasiswa" class="btn btn-sm btn-success m-b-10 mr-2" style="margin-left:4px;"><i class="fa fa-file-import fa-sm"></i>&nbsp; Import</a></li>
      <li class="breadcrumb-item active"><a type="button" title="tambah-data" data-toggle="modal" data-target="#Add-Mahasiswa" class="btn btn-sm btn-primary m-b-10 mr-2" style="margin-left:4px;"><i class="fa fa-plus-circle fa-sm"></i>&nbsp; Add Mahasiswa</a></li>
      <li class="breadcrumb-item active"><a type="button" title="filter-delete" data-toggle="modal" data-target="#Filter-Delete-Mahasiswa" class="btn btn-sm btn-danger m-b-10 mr-2" style="margin-left:4px;"><i class="fa fa-trash fa-sm"></i>&nbsp; Filter Delete</a></li>
    </ol>
  </div>--}}
</div>
@endsection

@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="col-md-12">
      @if ($message = Session::get('success-reset'))
      <div id="messageAlert" class="alert alert-success alert-dismissible">
        <i class="fa fa-check"></i> &nbsp; {{ $message }}
      </div>
      @endif
      <div class="card">
        <div class="card-header">
          <!-- <h5 class="card-title">Profile</h5> -->
          <h1 class="card-title" style="font-weight: 600; font-size: 1.2rem;">Master <small style="font-size: 12px; color: #777;">Data Mahasiswa</small></h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" style="font-size: 12px; color: #333; clear: both;">
            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">
                  <table id="datatable" class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline collapsed" style="font-size: 12px; font-weight: 400; color: black; width: 100%;" width="100%" role="grid" aria-describedby="data-table_info">
                    <thead>
                      <tr>
                        <th width="2%">No</th>
                        <th width="40%">Nama Lengkap</th>
                        <th style="text-align: center;">NIM</th>
                        <th style="text-align: center;">Prodi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      @foreach($all as $mhs)
                      <tr>
                        <td style="text-align: center;">{{ $no }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td style="text-align: center;">{{ $mhs->nim }}</td>
                        <td style="text-align: center;">{{ $mhs->getProdi->nama }}</td>
                        <td style="text-align: center;">
                          <a type="button" class="btn btn-warning btn-icon btn-sm" data-toggle="modal" data-target="#Reset-{{$mhs->id}}" title="Reset Password"><i class="fas fa-sync-alt fa-sm"></i></a>
                          {{--<a type="button" class="btn btn-danger btn-icon btn-sm" data-toggle="modal" data-target="#Delete-{{$mhs->id}}" title="Delete"><i class="fas fa-trash fa-sm"></i></a>--}}
                        </td>
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

@if(is_null($all) == 0)
@foreach($all as $mhs)
@include('modal.reset')
@endforeach
@endif

@endsection

@push('scripts')
<script>
  $(function() {
    $("#datatable").DataTable({
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