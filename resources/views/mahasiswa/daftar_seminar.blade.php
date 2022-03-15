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
                <div class="title bg"><b>Bar Progress Form Seminar</b></div>
              </div>
              <div class="progress2" style="background-color: white; margin: auto;">
                <?php $no = 1;
                $id = 0; ?>
                @foreach ($semis as $sm)
                  @if($file_sm[$id][0] == 0)
                  <div class="circle">
                    <p class="label">{{$no}}</p>
                    <p class="title">{{substr($sm->nama,0,8)}}</p>
                  </div>
                  @else
                  @if($file_sm[$id][1] == 1)
                  <div class="circle done">
                    <p class="label"><i class="fas fa-check"></i></p>
                    <p class="title">{{substr($sm->nama,0,8)}}</p>
                  </div>
                  @else
                  @if($file_sm[$id][2] == 0)
                  <div class="circle wait">
                    <p class="label"><i class="fas fa-ellipsis-h"></i></p>
                    <p class="title">{{substr($sm->nama,0,8)}}</p>
                  </div>
                  @else
                  <div class="circle">
                    <p class="label">{{$no}}</p>
                    <p class="title">{{substr($sm->nama,0,8)}}</p>
                  </div>
                  @endif
                  @endif
                  @endif
                <?php $no += 1;
                $id += 1; ?>
                @endforeach
              </div>
            </div>
          </div>
          <!-- ./card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 mb-4 text-center">
                <div class="title bg">Status Daftar Seminar</div>
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
                {{-- @if ($set == 0) --}}
                  @if (is_null($get))
                  <form action="{{ url('/mahasiswa/daftar-seminar-submit') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                            <select class="form-control select2 select2-hidden-accessible" name="dospem" style="width: 100%;">
                              <option selected="selected" disabled>...</option>
                              @foreach($dosens as $dosen)
                              <option value="{{$dosen->id}}">{{$dosen->nama}}</option>
                              @endforeach
                            </select>
                          </td>
                        </tr>

                        <tr>
                          <td>Mahasiswa Pembahas</td>
                          <td>
                            <select class="form-control select2 select2-hidden-accessible" name="pembahas" style="width: 100%;" required>
                              <option selected="selected" disabled>...</option>
                              @foreach($mahasiswas as $mhs)
                              <option value="{{$mhs->id}}">{{$mhs->nama}}</option>
                              @endforeach
                            </select>
                          </td>
                        </tr>
                        
                        <tr>
                          <td>Judul Laporan Akhir</td>
                          <td><textarea name="judul" class="form-control" rows="3" required></textarea></td>
                        </tr>

                        <tr>
                          <td>Tanggal Seminar</td>
                          <td><input type="date" class="form-control" name="tgl" required></td>
                        </tr>

                        <tr>
                          <td>Waktu Seminar</td>
                          <td><input type="time" class="form-control" name="waktu" required></td>
                        </tr>
                        
                        <tr>
                          <td>Dosen Moderator</td>
                          <td>(akan diisi oleh panitia)</td>
                        </tr>

                        <tr>
                          <td>Tautan</td>
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
                  <form action="{{ url('/mahasiswa/daftar-seminar-submit') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                              @foreach($dosens as $dosen)
                              <option value="{{$dosen->id}}" {{ ($dosen->id == $get->id_dosen) ? "selected": "" }}>{{$dosen->nama}}</option>
                              @endforeach
                            </select>
                          </td>
                        </tr>

                        <tr>
                          <td>Mahasiswa Pembahas</td>
                          <td>
                            <select class="form-control select2 select2-hidden-accessible" name="pembahas" style="width: 100%;" disabled>
                              @foreach($mahasiswas as $mhs)
                              <option value="{{$mhs->id}}" {{ ($mhs->id == $get->id_mhs) ? "selected": "" }}>{{$mhs->nama}}</option>
                              @endforeach
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
                          <td>Tanggal Seminar</td>
                          <td><input type="date" class="form-control" style="font-weight: 700;" value="{{$get->tgl}}" name="tgl" required disabled></td>
                        </tr>

                        <tr>
                          <td>Waktu Kolokium</td>
                          <td><input type="time" class="form-control" style="font-weight: 700;" value="{{date('H:i', strtotime($get->waktu)) }}" name="waktu" required disabled></td>
                        </tr>

                        <tr>
                          <td>Dosen Moderator</td>
                          <td>
                            @if ($mode == null)
                            Belum ada moderator
                            @else
                            {{$mode->nama}}                              
                            @endif
                          </td>
                        </tr>

                        <tr>
                          <td>Tautan</td>
                          <td>{{$get->link ?? 'Belum ada tautan'}}</td>
                        </tr>
                        
                        @endforeach
                      </tbody>
                    </table>
                  </form>
                  @endif
                {{-- @else
                  <br>
                  <div style="text-align: center; margin: 20px 0px;"><span style="font-size: 16px; color:red;">Belum bisa mendaftar seminar, unggah semua form persyaratan seminar terlebih dahulu.</span></div>
                  <br>
                @endif --}}
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