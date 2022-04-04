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

{{-- NEW --}}

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
                <div class="title bg">Status Daftar Sidang</div>
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

                @if ($pembahas != null)
                {{-- NILAI PEMBAHAS DIUBAH JADI != --}}
                  @if (is_null($get2))
                    @if (is_null($get))
                    <form action="{{ url('/mahasiswa/daftar-sidang-submit') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                            <td>Dosen Pembimbing</td>
                            <td>
                              <select class="form-control select2 select2-hidden-accessible" name="dospem" style="width: 100%;" disabled>
                                <option value="{{$data->id_dospem1}}" selcted>{{$data->getDospem1->nama}}</option>
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td>Judul Laporan Akhir</td>
                            <td><textarea name="judul" class="form-control" rows="3" required></textarea></td>
                          </tr>

                          <tr>
                            <td>Tanggal Sidang</td>
                            <td><input type="date" class="form-control" name="tgl" required></td>
                          </tr>

                          <tr>
                            <td>Waktu Sidang</td>
                            <td><input type="time" class="form-control" name="waktu" required></td>
                          </tr>

                          <tr>
                            <td>Dosen Penguji</td>
                            <td>(akan diisi oleh panitia)</td>
                          </tr>

                          <tr>
                            <td>Ruangan</td>
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
                    <form action="{{ url('/mahasiswa/daftar-sidang-submit') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                            <td>Dosen Pembimbing</td>
                            <td>                              
                              <select class="form-control select2 select2-hidden-accessible" name="dospem" style="width: 100%;" disabled>
                                <option value="{{$data->id_dospem1}}" selcted>{{$data->getDospem1->nama}}</option>
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td>Judul Laporan Akhir</td>
                            <td>
                              <textarea name="judul" class="form-control" style="font-weight: 700;" rows="3" disabled>{{$get->judul}}</textarea>
                            </td>
                          </tr>

                          <tr>
                            <td>Tanggal Sidang</td>
                            <td><input type="date" class="form-control" style="font-weight: 700;" value="{{$get->tgl}}" name="tgl" required disabled></td>
                          </tr>

                          <tr>
                            <td>Waktu Sidang</td>
                            <td><input type="time" class="form-control" style="font-weight: 700;" value="{{date('H:i', strtotime($get->waktu)) }}" name="waktu" required disabled></td>
                          </tr>

                          <tr>
                            <td>Dosen Penguji</td>
                            <td>
                              @if ($dosji == null)
                              Belum ada dosen penguji
                              @else
                              {{$dosji->nama}}                              
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td>Ruangan</td>
                            <td>{{$get->link ?? 'Belum ada tautan'}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </form>
                    @endif

                  @else
                    <form action="{{ url('/mahasiswa/daftar-sidang-submit') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                            <td>Dosen Pembimbing</td>
                            <td>                              
                              <select class="form-control select2 select2-hidden-accessible" name="dospem" style="width: 100%;" disabled>
                                <option value="{{$data->id_dospem1}}" selcted>{{$data->getDospem1->nama}}</option>
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td>Judul Laporan Akhir</td>
                            <td>
                              <textarea name="judul" class="form-control" style="font-weight: 700;" rows="3" disabled>{{$get2->judul}}</textarea>
                            </td>
                          </tr>

                          <tr>
                            <td>Tanggal Sidang</td>
                            <td><input type="date" class="form-control" style="font-weight: 700;" value="{{$get2->tgl}}" name="tgl" required disabled></td>
                          </tr>

                          <tr>
                            <td>Waktu Sidang</td>
                            <td><input type="time" class="form-control" style="font-weight: 700;" value="{{date('H:i', strtotime($get2->waktu)) }}" name="waktu" required disabled></td>
                          </tr>

                          <tr>
                            <td>Dosen Penguji</td>
                            <td>
                              @if ($dosji == null)
                              Belum ada dosen penguji
                              @else
                              {{$dosji->nama}}                              
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td>Ruangan</td>
                            <td>{{$get2->link ?? 'Belum ada tautan'}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </form>  
                  @endif

                @else
                  <p style="text-align: center; color: red; margin: 40px;">
                    Mahasiswa belum bisa mendaftar sidang karena belum ada nilai pembahas
                  </p>
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
@endpush