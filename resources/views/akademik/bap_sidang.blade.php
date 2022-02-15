@extends('layouts.akademik') 

@section('page-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <form action="{{ url('/akademik/bap-sidang/filter') }}" method="POST" class="form-horizontal ml-2 mr-2">
      @csrf
      <div class="form-group row">
        <div class="col-sm-5">
          <select class="form-control select2" name="prodi" required>
            <option selected="selected" value="" disabled>...</option>
            <option value="1">Manajemen Informatika</option>
            <option value="2">Teknik Komputer</option>
          </select>
        </div>
        <div class="col-sm-2">
          <button type="submit" name="kirim" class="btn btn-primary btn-sm mt-1"><i class="fa fa-search fa-sm"></i></button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <!-- <h5 class="card-title">Profile</h5> -->
          <h1 class="card-title" style="font-weight: 600; font-size: 1.2rem;">Master <small style="font-size: 12px; color: #777;">BAP Sidang</small></h1>
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
                        <th style="text-align: center;">Program Studi</th>
                        <th style="text-align: center;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @for($i = 0; $i < count($data); $i++) 
                      <tr>
                        <td style="text-align: center;">{{ $i+1 }}</td>
                        <td>{{ $data[$i][0] }}</td>
                        <td style="text-align: center;">{{ $data[$i][1] }}</td>
                        <td style="text-align: center;">{{ $data[$i][2] }}</td>
                        <td style="text-align: center;">
                          @if ($data[$i][3] != 0) 
                          <a href="{{route('download-bap-sidang-d',$data[$i][3])}}" type="button" class="btn btn-primary btn-sm" style="font-size: 12px;">BAP DOSPEM</a> &nbsp; 
                          @else 
                          <span></span> 
                          @endif 
 
                          @if ($data[$i][4] != 0) 
                          <a href="{{route('download-bap-sidang-j',$data[$i][4])}}" type="button" class="btn btn-primary btn-sm" style="font-size: 12px;">BAP PENGUJI</a> &nbsp; 
                          @else 
                          <span></span> 
                          @endif 
 
                          {{-- <a href="{{route('download-zip-a',['file'=>$data[$i][5], 'nama'=>$data[$i][0] ])}}" type="button" class="btn btn-primary btn-sm" style="font-size: 12px;">ZIP FILE</a> 
                          <a href="{{route('download-bap-sidang-d',$data[$i][3])}}" type="button" class="btn btn-primary btn-sm">BAP DOSEN</a> &nbsp;
                          <a href="{{route('download-bap-sidang-j',$data[$i][4])}}" type="button" class="btn btn-primary btn-sm">BAP PENGUJI</a> --}}
                        </td>
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

      <hr>

      <div class="card">
        <div class="card-header">
          <!-- <h5 class="card-title">Profile</h5> -->
          <h1 class="card-title" style="font-weight: 600; font-size: 1.2rem;">Master <small style="font-size: 12px; color: #777;">BAP Sidang Ulang</small></h1>
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
                        <th style="text-align: center;">Program Studi</th>
                        <th style="text-align: center;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @for($i = 0; $i < count($data2); $i++) 
                      <tr>
                        <td style="text-align: center;">{{ $i+1 }}</td>
                        <td>{{ $data2[$i][0] }}</td>
                        <td style="text-align: center;">{{ $data2[$i][1] }}</td>
                        <td style="text-align: center;">{{ $data2[$i][2] }}</td>
                        <td style="text-align: center;">
                          @if ($data[$i][3] != 0) 
                          <a href="{{route('download-bap-sidang-du',$data[$i][3])}}" type="button" class="btn btn-primary btn-sm" style="font-size: 12px;">BAP DOSPEM</a> &nbsp; 
                          @else 
                          <span></span> 
                          @endif 
 
                          @if ($data[$i][4] != 0) 
                          <a href="{{route('download-bap-sidang-du',$data[$i][4])}}" type="button" class="btn btn-primary btn-sm" style="font-size: 12px;">BAP PENGUJI</a> &nbsp; 
                          @else 
                          <span></span> 
                          @endif 
 
                          {{-- <a href="{{route('download-zip-a',['file'=>$data[$i][5], 'nama'=>$data[$i][0] ])}}" type="button" class="btn btn-primary btn-sm" style="font-size: 12px;">ZIP FILE</a> 
                          <a href="{{route('download-bap-sidang-du',$data2[$i][3])}}" type="button" class="btn btn-primary btn-sm">BAP DOSEN</a> &nbsp;
                          <a href="{{route('download-bap-sidang-ju',$data2[$i][4])}}" type="button" class="btn btn-primary btn-sm">BAP PENGUJI</a> --}}
                        </td>
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

<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>
@endpush