@extends('layouts.dosen')

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11" style="margin: auto;">


        <form action="{{ url('/dosen/update/seminar-bap-moderator', $bap->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 mb-5">
                  <div class="title text-center" style="font-weight: 600;"> EDIT PENGISIAN BAP SEMINAR </div>
                  <div class="div">
                    <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                      <tbody>
                        <tr>
                          <td>Nama Penyaji</td>
                          <td>:</td>
                          <td>{{$mhs->nama}}</td>
                        </tr>
                        <tr>
                          <td>NIM </td>
                          <td>:</td>
                          <td>{{$mhs->nim}}</td>
                        </tr>
                        <tr>
                          <td>Hari/Tanggal</td>
                          <td>:</td>
                          <td>{{ Carbon\Carbon::parse($data->tgl)->translatedFormat('l/ d F Y'); }}</td>
                        </tr>
                        <tr>
                          <td>Waktu</td>
                          <td>:</td>
                          <td>{{date('H:i', strtotime($data->waktu))}}</td>
                        </tr>
                        <tr>
                          <td>Judul Tugas Akhir</td>
                          <td>:</td>
                          <td>{{$data->judul}}</td>
                        </tr>
                      </tbody>
                    </table>

                    <p style="font-size: .875rem; font-weight: 600;">Penilaian :</p>
                    <table class="table table-bordered text-center" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                      <input type="text" name="id_mhs" value="{{$mhs->id}}" hidden>
                      <thead>
                        <tr>
                          <td rowspan="2">No.</td>
                          <td rowspan="2" style="vertical-align : middle;">Aspek</td>
                          <td rowspan="2" style="vertical-align : middle;">Bobot</td>
                          <td colspan="2">Dosen Moderator</td>
                        </tr>
                        <tr>
                          <td>Nilai</td>
                          <td>Bobot x Nilai</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1. </td>
                          <td style="text-align: left;">Format dan substansi makalah</td>
                          <td>30%</td>
                          <td><input type="number" class="form-control" name="nilai1" value="{{$bap->nilai1}}"></td>
                          <td><input type="number" class="form-control" disabled name="nilai1_1"></td>
                        </tr>
                        <tr>
                          <td>2. </td>
                          <td style="text-align: left;">Penyajian makalah</td>
                          <td>30%</td>
                          <td><input type="number" class="form-control" name="nilai2" value="{{$bap->nilai2}}"></td>
                          <td><input type="number" class="form-control" disabled name="nilai2_1"></td>
                        </tr>
                        <tr>
                          <td>3. </td>
                          <td style="text-align: left;">Argumentasi dalam forum diskusi</td>
                          <td>40%</td>
                          <td><input type="number" class="form-control" name="nilai3" value="{{$bap->nilai3}}"></td>
                          <td><input type="number" class="form-control" disabled name="nilai3_1"></td>
                        </tr>
                        <tr>
                          <td colspan="2">Total</td>
                          <td>100%</td>
                          <td><input type="number" class="form-control" disabled name="total1"></td>
                          <td><input type="number" class="form-control" disabled name="total2"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- ./card-body -->

          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 mb-5">
                  <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN PEMBAHAS SEMINAR </div>
                  <div class="div">
                    <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                      <tbody>
                        <tr>
                          <td>Mahasiswa Pembahas</td>
                          <td>:</td>
                          <td>
                            <select class="form-control select2" name="pembahas" style="width: 100%;" disabled>
                              @if ($data->id_pembahas != 0)
                              <option selected="selected" value="{{$pembahas->id}}">{{$pembahas->nim}} - {{$pembahas->nama}}</option>
                              @endif

                              @foreach($mahasiswas as $pm)
                              <option value="{{$pm->id}}">{{$pm->nim}} - {{$pm->nama}}</option>
                              @endforeach
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3">
                            <small style="color: red;">Ubah mahasiswa pembahas jika saat seminar pembahas berubah</small>
                          </td>
                        </tr>
                        <tr>
                          <td>Hari/Tanggal</td>
                          <td>:</td>
                          <td>{{ Carbon\Carbon::parse($data->tgl)->translatedFormat('l/ d F Y'); }}</td>
                        </tr>
                        <tr>
                          <td>Waktu</td>
                          <td>:</td>
                          <td>{{date('H:i', strtotime($data->waktu))}}</td>
                        </tr>
                        <tr>
                          <td>Nama Penyaji</td>
                          <td>:</td>
                          <td>{{$mhs->nama}}</td>
                        </tr>
                        <tr>
                          <td>NIM </td>
                          <td>:</td>
                          <td>{{$mhs->nim}}</td>
                        </tr> 
                        <tr>
                          <td>Judul Makalah</td>
                          <td>:</td>
                          <td>{{$data->judul}}</td>
                        </tr>
                        <tr></tr>
                        <tr>
                          <td>Nilai</td>
                          <td>:</td>
                          <td><input type="number" name="nilai_pembahas" class="form-control" required value="{{ $nilai_pembahas->nilai_pembahas }}"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- ./card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 mb-5">
                  <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN FORM PENILAIAN FORUM SEMINAR DAN DAFTAR HADIR </div>
                  <div class="div">
                    <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px 30px 0px;">
                      <tbody>
                        <tr>
                          <td>Hari/Tanggal</td>
                          <td>:</td>
                          <td>{{ Carbon\Carbon::parse($data->tgl)->translatedFormat('l/ d F Y'); }}</td>
                        </tr>
                        <tr>
                          <td>Nama Pemrasaran</td>
                          <td>:</td>
                          <td>{{$mhs->nama}}</td>
                        </tr>
                        <tr>
                          <td>NIM </td>
                          <td>:</td>
                          <td>{{$mhs->nim}}</td>
                        </tr> 
                      </tbody>
                    </table>
                    
                    <small style="color: red;"> Pengisian nilai dan keterangan hanya kepada forum yang bertanya pada saat seminar, selebihnya dikosongkan</small>
                    <table id="datatable" class="table table-bordered" cellspacing="0" cellpadding="0" style="font-size: .875rem;">
                      <thead>
                        <tr>
                          <th width="5%">NO</th>
                          <th width="30%">NAMA</th>
                          <th width="10%">NIM</th>
                          <th width="15%">HADIR</th>
                          <th width="15%">NILAI</th>
                          <th width="25%">KETERANGAN</th>
                        </tr>  
                      </thead>
                      <tbody>
                        @for($i = 0; $i < count($forum); $i++) 
                        <tr>
                          <td>{{ $i+1 }}</td>
                          <td>{{ $forum[$i][1] }}</td>
                          <td>{{ $forum[$i][2] }}</td>
                          <td>  
                            <input type="hidden" name="id_hadir[]" value="{{ $forum[$i][0] }}">
                            @if ($forum[$i][3] == 1)
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="hadir{{$forum[$i][0]}}" value="1" checked>
                              <label class="form-check-label">Hadir</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="hadir{{$forum[$i][0]}}" value="0">
                              <label class="form-check-label">Tidak Hadir</label>
                            </div>
                            @else
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="hadir{{$forum[$i][0]}}" value="1">
                              <label class="form-check-label">Hadir</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="hadir{{$forum[$i][0]}}" value="0" checked>
                              <label class="form-check-label">Tidak Hadir</label>
                            </div>
                            @endif
                          </td>
                            @if ($forum[$i][4] == null)
                            <td><input type="number" name="nilai_forum{{$forum[$i][0]}}" class="form-control"></td>
                            <td><textarea name="ket_forum{{$forum[$i][0]}}" rows="1" class="form-control"></textarea></td>
                            @else
                            <td><input type="number" name="nilai_forum{{$forum[$i][0]}}" class="form-control" value="{{ $forum[$i][5] }}"></td>
                            <td><textarea name="ket_forum{{$forum[$i][0]}}" rows="1" class="form-control">{{ $forum[$i][6] }}</textarea></td>
                            @endif
                        </tr>
                        @endfor
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- ./card-body -->

          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 mb-5">
                  <div class="div">
                    <div class="row">
                      <div class="col-md-8"></div>
                      <div class="col-md-4 mt-5">
                        <label style="font-size: 14px;">Tanggal Pengisian</label>
                        <input type="date" class="form-control" name="tgl" value="{{$data->tgl}}" style="border: none; border-bottom: 1px solid black; border-radius: 0px;">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-8 mt-5"></div>
                      <div class="col-md-4">
                        <br>
                        <img src="{{asset($dosen->ttd)}}"style="width: 3cm; height: 2cm;">
                        <div>
                          <p style="padding-top:10px; margin-bottom:-2px; font-weight: 600; font-size: 14px;">{{$dosen->nama}}</p>
                          <p style="font-weight: 600; font-size: 14px;">NPI {{$dosen->nip}}</p>
                        </div>
                      </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-save fa-sm"></i>&nbsp; Kirim</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ./card-body -->
          </div>
          <!-- /.card -->
        </form>
      </div>
      <!-- /.col -->
    </div>


  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection