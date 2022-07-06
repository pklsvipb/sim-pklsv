@extends('layouts.panitia')

@section('page-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <form action="{{ url('/panitia/bap/filter') }}" method="POST" class="form-horizontal ml-2 mr-2">
      @csrf
      <div class="form-group row">
        <div class="col-sm-5">
          <select class="form-control select2" name="ket" required>
            <option selected="selected" value="" disabled>...</option>
            <option value="kl">Kolokium</option>
            <option value="sm">Seminar</option>
            <option value="sd">Sidang</option>
            <option value="sd2">Sidang Ulang</option>
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
          <h1 class="card-title" style="font-weight: 600; font-size: 1.2rem;">Master <small style="font-size: 12px; color: #777;">BAP Seminar</small></h1>
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
                        <th width="5%">No</th> 
                        <th width="20%">Nama Lengkap</th> 
                        <th width="5%" style="text-align: center;">NIM</th> 
                        <th width="20%" style="text-align: center;">Dosen Pembimbing</th> 
                        <th width="20%" style="text-align: center;">Moderator</th> 
                        <th width="30%" style="text-align: center;">Aksi</th> 
                      </tr> 
                    </thead> 
                    <tbody> 
                      @for($i = 0; $i < count($data); $i++)  
                      <tr> 
                        <td style="text-align: center;">{{ $i+1 }}</td> 
                        <td>{{ $data[$i][0] }}</td> 
                        <td style="text-align: center;">{{ $data[$i][1] }}</td> 
                        <td style="text-align: center;">{{ $data[$i][4] }}</td> 
                        <td style="text-align: center;">{{ $data[$i][5] }}</td> 
                        <td style="text-align: center;"> 
                          @if ($data[$i][2] != 0) 
                          <a href="{{route('download-bap-smd',$data[$i][2])}}" type="button" class="btn btn-primary btn-sm" style="font-size: 10.5px;">BAP DOSPEM</a> &nbsp; 
                          @else 
                          <span></span> 
                          @endif 
 
                          @if ($data[$i][3] != 0) 
                          <a href="{{route('download-bap-smm',$data[$i][3])}}" type="button" class="btn btn-primary btn-sm" style="font-size: 10.5px;">BAP MODERATOR</a><br>
                          <a href="{{route('download-sm-pembahas', $data[$i][3])}}" style="font-size: 10.5px;" class="btn btn-primary btn-sm mt-1">PEMBAHAS</a> &nbsp;
                          <a href="{{route('download-sm-forum', $data[$i][3])}}" style="font-size: 10.5px;" class="btn btn-primary btn-sm mt-1">FORUM</a> &nbsp;
                          @else 
                          <span></span> 
                          @endif 
 
                          {{-- <a href="{{route('download-zip',['file'=>$data[$i][6], 'nama'=>$data[$i][0] ])}}" type="button" class="btn btn-primary btn-sm" style="font-size: 10.5px;">ZIP FILE</a> --}}
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