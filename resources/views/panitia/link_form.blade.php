@extends('layouts.panitia')

@section('page-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h4 class="judul ml-2" style="font-weight: 600;">Link Form <small style="font-size: 12px; color: #777;"></small></h3>
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
          <h1 class="card-title" style="font-weight: 600; font-size: 1.2rem;">Data <small style="font-size: 12px; color: #777;">Form</small></h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" style="font-size: 12px; color: #333; clear: both;">
            <div class="row">
              <div class="col-sm-12">
                <div class="">
                  <form action="{{route('link-form-save')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <table id="datatable1" class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline collapsed" style="font-size: 12px; font-weight: 400; color: black; width: 100%;" width="100%" role="grid" aria-describedby="data-table_info">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th width="25%" style="text-align: center;">Nama Form</th>
                          <th width="20%" style="text-align: center;">Program Studi</th>
                          <th width="45%" style="text-align: center;">Link Form</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Transkrip Nilai</td>
                          <td>{{$panitia->getProdi->nama}}</td>
                          <td>
                            <input type="text" readonly id="linkNilai" class="form-control" name="link_nilai" value="{{$panitia->link_nilai}}" placeholder="Link untuk transkrip nilai">
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Kartu Bimbingan Akademik</td>
                          <td>{{$panitia->getProdi->nama}}</td>
                          <td>
                            <input type="text" readonly id="linkBimbinganAka" class="form-control" name="link_bimbingan_aka" value="{{$panitia->link_bimbingan_aka}}" placeholder="Link untuk kartu bimbingan akademik">
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Form 015 Penilaian instansi terhadap mahasiswa PKL</td>
                          <td>{{$panitia->getProdi->nama}}</td>
                          <td>
                            <input type="text" readonly id="linkForm015" class="form-control" name="link_form015" value="{{$panitia->link_form015}}" placeholder="Link untuk form 015">
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Bukti Pembayaran SPP</td>
                          <td>{{$panitia->getProdi->nama}}</td>
                          <td>
                            <input type="text" readonly id="bayarSpp" class="form-control" name="bayar_spp" value="{{$panitia->bayar_spp}}" placeholder="Link untuk bukti pembayaran spp">
                          </td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>Persyaratan Seminar</td>
                          <td>{{$panitia->getProdi->nama}}</td>
                          <td>
                            <input type="text" readonly id="syaratSeminar" class="form-control" name="syarat_seminar" value="{{$panitia->syarat_seminar}}" placeholder="Link untuk file persyaratan seminar">
                          </td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>Persyaratan Sidang</td>
                          <td>{{$panitia->getProdi->nama}}</td>
                          <td>
                            <input type="text" readonly id="syaratSidang" class="form-control" name="syarat_sidang" value="{{$panitia->syarat_sidang}}" placeholder="Link untuk file persyaratan sidang">
                          </td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="3"></td>
                          <td>
                            <button type="submit" class="form-control btn btn-success" style="color: white">Simpan Data</button>
                          </td>
                        </tr>
                      </tfoot>
                    </table>
                  </form>
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

  document.getElementById('linkNilai').onclick = function() {
    document.getElementById('linkNilai').removeAttribute('readonly');
  };

  document.getElementById('linkForm015').onclick = function() {
    document.getElementById('linkForm015').removeAttribute('readonly');
  };
  
  document.getElementById('linkBimbinganAka').onclick = function() {
    document.getElementById('linkBimbinganAka').removeAttribute('readonly');
  };

  document.getElementById('bayarSpp').onclick = function() {
    document.getElementById('bayarSpp').removeAttribute('readonly');
  };
  
  document.getElementById('syaratSeminar').onclick = function() {
    document.getElementById('syaratSeminar').removeAttribute('readonly');
  };

  document.getElementById('syaratSidang').onclick = function() {
    document.getElementById('syaratSidang').removeAttribute('readonly');
  };
</script>
@endpush