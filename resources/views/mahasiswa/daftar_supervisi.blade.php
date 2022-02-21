@extends('layouts.mahasiswa')

@section('user')
<div class="info">
  <a href="#" class="d-block">
    @foreach($datas as $data)
    <span> {{$data->nama}}</span>
    &nbsp;
    @endforeach

    <p style="font-size: 11px; ">Mahasiswa</p>
  </a>
</div>
@endsection

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
            <div class="row">
              <div class="col-md-12 mb-4 text-center">
                <div class="title bg">Status Daftar Supervisi</div>
                <br>
                @if (count($status) == 0)
                <a type="button" class="btn btn-sm btn-secondary" style="padding: 5px 40px" disabled>Belum Daftar</a>
                @else
                  @if ($status[0] == 0)
                  <a type="button" class="btn btn-sm btn-warning" style="padding: 5px 40px" disabled>Menunggu</a>
                  @else
                  <a type="button" class="btn btn-sm btn-success" style="padding: 5px 40px" disabled>Disetujui</a>
                  @endif
                @endif
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

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                @if (is_null($get))
                <form action="{{ url('/mahasiswa/daftar-supervisi-submit') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <table class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                    <tbody>
                      @foreach($datas as $data)
                      <tr>
                        <td width="400px">Nama</td>
                        <td><input type="text" name="nama" class="form-control" value="{{$data->nama}}" disabled></td>
                      </tr>

                      <tr>
                        <td>NIM</td>
                        <td><input type="text" name="nim" class="form-control" value="{{$data->nim}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Program Studi</td>
                        <td><input type="text" name="prodi" class="form-control" value="{{$data->getProdi->nama}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Kelompok</td>
                        <td><input type="text" name="kelompok" class="form-control" value="{{$data->kelompok}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Nama Instansi</td>
                        <td><input type="text" class="form-control" name="instansi" value="{{$data->instansi}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Alamat Instansi</td>
                        <td><input type="text" class="form-control" name="alamat" value="{{$data->alamat_instansi}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Bidang Usaha</td>
                        <td><input type="text" class="form-control" name="bidang_usaha" required></td>
                      </tr>

                      <tr>
                        <td>Tanggal Supervisi</td>
                        <td><input type="date" class="form-control" name="tgl" style="border: none; border-bottom: 1px solid black; border-radius: 0px;"></td>
                      </tr>

                      <tr>
                        <td>Dosen Penjajakan/Supervisi</td>
                        <td>(akan diisi oleh panitia)</td>
                      </tr>

                      <tr>
                        <td style="border-top: none;"></td>
                        <td style="border-top: none;"><button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save fa-sm"></i> Kirim</button></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </form>

                @else
                <form action="{{ url('/mahasiswa/daftar-supervisi-submit') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <table class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                    <tbody>
                      @foreach($datas as $data)
                      <tr>
                        <td width="400px">Nama</td>
                        <td><input type="text" name="nama" class="form-control" value="{{$data->nama}}" disabled></td>
                      </tr>

                      <tr>
                        <td>NIM</td>
                        <td><input type="text" name="nim" class="form-control" value="{{$data->nim}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Program Studi</td>
                        <td><input type="text" name="prodi" class="form-control" value="{{$data->getProdi->nama}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Kelompok</td>
                        <td><input type="text" name="kelompok" class="form-control" value="{{$data->kelompok}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Nama Instansi</td>
                        <td><input type="text" class="form-control" name="instansi" value="{{$get->instansi}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Alamat Instansi</td>
                        <td><input type="text" class="form-control" name="alamat" value="{{$get->alamat_instansi}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Bidang Usaha</td>
                        <td><input type="text" class="form-control" name="bidang_usaha" value="{{$get->bidang_usaha}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Tanggal Supervisi</td>
                        <td><input type="date" class="form-control" name="tgl" value="{{$get->tanggal}}" style="border: none; border-bottom: 1px solid black; border-radius: 0px;" disabled></td>
                      </tr>

                      <tr>
                        <td>Dosen Penjajakan/Supervisi</td>
                        <td>
                          @if ($dosen == null)
                          Belum ada dosen penjajakan/supervisi
                          @else
                          {{$dosen->nama}}                              
                          @endif
                        </td>
                      </tr>

                      @endforeach
                    </tbody>
                  </table>
                </form>
                @endif    
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
@endsection

<!-- https://medium.com/@tarekabdelkhalek/how-to-create-a-drag-and-drop-file-uploading-in-angular-78d9eba0b854 -->

@push('scripts')
<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>

<script>
  $("#file-1").fileinput({
    theme: 'fas',
    browseOnZoneClick: true,
    showUpload: false,
    removeClass: "btn-sm",
    browseClass: "btn btn-primary btn-sm",
    previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
    fileActionSettings: {
      showUpload: false,
    },
  });
</script>
@endpush