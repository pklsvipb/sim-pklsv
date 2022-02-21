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
            <div class="row">
              <div class="col-md-12">

                @if ($daftar == null)
                <div style="text-align: center; margin: 10px 0px 20px 0px;"><span style="font-size: 16px;">kelompok <b>{{$mahasiswa->kelompok}}</b> belum mendaftar supervisi</span></div>
                @else
                <form action="{{ route('supervisi-vds', $daftar->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                        <td>Kelompok</td>
                        <td><input type="text" name="kelompok" class="form-control" value="{{$daftar->kelompok}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Nama Instansi</td>
                        <td><input type="text" class="form-control" name="instansi" value="{{$daftar->instansi}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Alamat Instansi</td>
                        <td><input type="text" class="form-control" name="alamat" value="{{$daftar->alamat_instansi}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Bidang Usaha</td>
                        <td><input type="text" class="form-control" name="bidang_usaha" value="{{$daftar->bidang_usaha}}" disabled></td>
                      </tr>

                      <tr>
                        <td>Tanggal Supervisi</td>
                        <td><input type="date" class="form-control" name="tgl" value="{{$daftar->tanggal}}" style="border: none; border-bottom: 1px solid black; border-radius: 0px;" disabled></td>
                      </tr>

                      <tr>
                        <td>Dosen Penjajakan/Supervisi</td>
                        <td>
                            <select class="form-control select2 select2-hidden-accessible" name="dosen" style="width: 100%;">
                              
                              @if ($dosen == null)
                              <option selected="selected" disabled>...</option>
                              @else
                              <option selected="selected" value="{{$dosen->id}}">{{$dosen->nama}}</option>
                              @endif
                        
                              @foreach($allDosens as $allDosen)
                              <option value="{{$allDosen->id}}">{{$allDosen->nama}}</option>
                              @endforeach
                            </select>
                        </td>
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