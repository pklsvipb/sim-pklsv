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
                <div class="title bg">Status Daftar Kolokium</div>
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
                {{-- <div class="row text-center">

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

                  <div class="col-md-6" id="menu-pertama">
                    <a href="{{ route('kolokium') }}" style="text-decoration: none; padding: 17px 150px;">DOWNLOAD DAN UPLOAD FORM</a>
                  </div>
                  <div class="col-md-6" id="menu-kedua">
                    <a href="{{ route('d-kolokium') }}" style="text-decoration: none; padding: 17px 197px;">DAFTAR KOLOKIUM</a>
                  </div>

                </div> --}}

                {{-- @if ($set == 0) --}}
                  @if (is_null($get))
                  <form action="{{ url('/mahasiswa/daftar-kolokium-submit') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                              <option value="{{$data->id_dospem1}}" selcted>{{$data->getDospem1->nama}}</option>
                            </select>
                          </td>
                        </tr>

                        <tr>
                          <td>Rencana Tugas Akhir</td>
                          <td>
                            <textarea name="judul" class="form-control" rows="3" required></textarea>
                          </td>
                        </tr>

                        <tr>
                          <td>Lokasi Tugas Akhir</td>
                          <td><input type="text" class="form-control" name="lokasi" required></td>
                        </tr>

                        <tr>
                          <td>Tanggal Kolokium</td>
                          <td><input type="date" class="form-control" name="tgl" required></td>
                        </tr>

                        <tr>
                          <td>Waktu Kolokium</td>
                          <td><input type="time" class="form-control" name="waktu" required></td>
                        </tr>

                        {{-- <tr>
                          <td>Upload Persyaratan</td>
                          <td>
                            <div class="form-group">
                              <div class="file-loading">
                                <input id="file-1" class="file" name="file[]" type="file" multiple data-theme="fas">
                              </div>
                            </div>
                          </td>
                        </tr> --}}

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
                      @if ($nilai_d_kelayakan == 'tidak' || $nilai_d_keputusan == 'ulang' || $nilai_m_kelayakan == 'tidak')
                      <form action="{{ url('/mahasiswa/perbaikan-daftar-kolokium-submit') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
    
                        <table class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                          <tbody>
                            @foreach($datas as $data)
                            <tr>
                              <td style="border-top: none;">Judul Rencana Tugas Akhir</td>
                              <td style="border-top: none;">
                                <textarea name="judul" class="form-control" style="font-weight: 700;" rows="3" disabled>{{$get->judul}}</textarea>
                              </td>
                            </tr>
                            <tr>
                              <td>Judul Terbaru</td>
                              <td>
                                <textarea name="judul" class="form-control" style="font-weight: 700;" rows="3"></textarea>
                              </td>
                            </tr>
                            <tr>
                              <td style="border-top: none;"></td>
                              <td style="border-top: none;"><button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save fa-sm"></i> Simpan</button></td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </form>
                      @else
                      <form action="{{ url('/mahasiswa/daftar-kolokium-submit') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                              <td>Rencana Tugas Akhir</td>
                              <td>
                                <textarea name="judul" class="form-control" style="font-weight: 700;" rows="3" disabled>{{$get->judul}}</textarea>
                              </td>
                            </tr>
    
                            <tr>
                              <td>Lokasi Tugas Akhir</td>
                              <td><input type="text" class="form-control" style="font-weight: 700;" value="{{$get->lokasi}}" name="lokasi" required disabled></td>
                            </tr>
    
                            <tr>
                              <td>Tanggal Kolokium</td>
                              <td><input type="date" class="form-control" style="font-weight: 700;" value="{{$get->tgl}}" name="tgl" required disabled></td>
                            </tr>
    
                            <tr>
                              <td>Waktu Kolokium</td>
                              <td><input type="time" class="form-control" style="font-weight: 700;" value="{{date('H:i', strtotime($get->waktu)) }}" name="waktu" required disabled></td>
                            </tr>
    
                            {{-- <tr>
                              <td>Upload Persyaratan</td>
                              <td>
                                <?php for ($i = 0; $i < count($getname); $i++) { ?>
                                  <a type="button" class="btn btn-primary btn-sm mb-2" style="border-radius: 20px;" href="{{ asset($filename[$i]) }}" download="{{$getname[$i][3]}}">{{$getname[$i][3]}}</a>
                                <?php } ?>
                              </td>
                            </tr> --}}
    
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
                  @endif    
                {{-- @else
                  <br>
                  <div style="text-align: center; margin: 20px 0px;"><span style="font-size: 16px; color:red;">Belum bisa mendaftar kolokium, unggah semua form persyaratan kolokium terlebih dahulu.</span></div>
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