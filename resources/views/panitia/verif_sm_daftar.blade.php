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

    <style>
      #menu-pertama {
        padding: 7px 0px;
        margin-bottom: 10px;
      }

      #menu-pertama a {
        color: black;
        font-weight: 600;
        font-size: 13px;
      }

      #menu-pertama:hover {
        background: #f8f9f9;
      }

      #menu-kedua {
        padding: 7px 0px;
        margin-bottom: 10px;
        border-bottom: 2px solid black;
      }

      #menu-kedua a {
        color: black;
        font-weight: 600;
        font-size: 13px;
      }

      #menu-kedua:hover {
        background: #f8f9f9;
      }
    </style>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">

                <div class="row text-center">
                  <div class="col-md-6" id="menu-pertama">
                    <a href="{{ route('seminar-vf', $id_mhs) }}" style="text-decoration: none; padding: 17px 165px;">VERIFIKASI FORM SEMINAR</a>
                  </div>
                  <div class="col-md-6" id="menu-kedua">
                    <a href="{{ route('seminar-vd', $id_mhs) }}" style="text-decoration: none; padding: 17px 160px;">VERIFIKASI DAFTAR SEMINAR</a>
                  </div>
                </div>
                <br>

                @if ($daftar == null)
                <div style="text-align: center; margin: 10px 0px 20px 0px;"><span style="font-size: 16px;"><b>{{$mahasiswa->nama}}</b> belum mendaftar kolokium</span></div>
                @else
                <form action="{{ route('seminar-vds', $daftar->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <table class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                    <tbody>
                      <tr>
                        <td width="400px">Nama</td>
                        <td><input type="text" name="nama" class="form-control" value="{{$mahasiswa->nama}}" disabled></td>
                      </tr> 

                      <tr>
                        <td>NIM</td>
                        <td><input type="text" name="nim" class="form-control" value="{{$mahasiswa->nim}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Program Studi</td>
                        <td><input type="text" name="prodi" class="form-control" value="{{$mahasiswa->getProdi->nama}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Dosen Pembimbing</td>
                        <td><input type="text" name="dosen" class="form-control" value="{{$dosbim->nama}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Judul Laporan Akhir</td>
                        <td>
                          <textarea name="judul" class="form-control" style="font-weight: 700;" rows="3" disabled>{{$daftar->judul}}</textarea>
                        </td>
                      </tr>

                      <tr>
                        <td>Tanggal Seminar</td>
                        <td><input type="date" class="form-control" style="font-weight: 700;" value="{{$daftar->tgl}}" name="tgl" disabled></td>
                      </tr>

                      <tr>
                        <td>Waktu Seminar</td>
                        <td><input type="time" class="form-control" style="font-weight: 700;" value="{{date('H:i', strtotime($daftar->waktu)) }}" name="waktu" disabled></td>
                      </tr>

                      <tr>
                        <td>Upload Persyaratan</td>
                        <td>
                          <?php for ($i = 0; $i < count($getname); $i++) { ?>
                            <a type="button" class="btn btn-primary btn-sm mb-2" style="border-radius: 20px;" href="{{ asset($filename[$i]) }}" download="{{$getname[$i][3]}}">{{$getname[$i][3]}}</a>
                          <?php } ?>
                        </td>
                      </tr>

                      <tr>
                        <td>Dosen Moderator</td>
                        <td>
                            <select class="form-control select2 select2-hidden-accessible" name="moderator" style="width: 100%;">
                                
                              @if ($moderator == null)
                              <option selected="selected" disabled>...</option>
                              @else
                              <option selected="selected" value="{{$moderator->id}}">{{$moderator->nama}}</option>
                              @endif

                              @foreach($dosens as $dosen)
                              <option value="{{$dosen->id}}">{{$dosen->nama}}</option>
                              @endforeach
                            </select>
                        </td>
                      </tr>

                      <tr>
                        <td>Tautan</td>
                        <td><input type="text" class="form-control" style="font-weight: 700;" name="link" value="{{$daftar->link}}"></td>
                      </tr>

                      <tr>
                          <td></td>
                          <td><button type="submit" class="btn btn-danger btn-sm" name="status" value="0">TOLAK</button> &ensp; <button type="submit" class="btn btn-success btn-sm" name="status" value="1">SETUJUI / UPDATE</button></td>
                      </tr>
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

@push('scripts')
<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>
@endpush