@extends('layouts.dosen')

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11" style="margin: auto;">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="title text-center" style="font-weight: 600;"> EDIT PENGISIAN BAP SIDANG ULANG</div>
                <div class="div">
                  <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                    <tbody>
                      <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{$mhs->nama}}</td>
                      </tr>
                      <tr>
                        <td>NIM </td>
                        <td>:</td>
                        <td>{{$mhs->nim}}</td>
                      </tr>
                      <tr>
                        <td>Judul Laporan Akhir</td>
                        <td>:</td>
                        <td>{{$data->judul}}</td>
                      </tr>
                      <tr>
                        <td>Hari/Tanggal Ujian</td>
                        <td>:</td>
                        <td>{{date('d-m-Y', strtotime($data->tgl))}}</td>
                      </tr>
                      <tr>
                        <td>Waktu Ujian</td>
                        <td>:</td>
                        <td>{{date('H:i', strtotime($data->waktu))}}</td>
                      </tr>
                    </tbody>
                  </table>

                  <form action="{{ url('/dosen/update/sidang-bap-penguji', $bap->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <p style="font-size: .875rem; font-weight: 600;">Penilaian :</p>
                    <table class="table table-bordered text-center" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                      <input type="text" name="id_mhs" value="{{$mhs->id}}" hidden>
                    <thead>
                        <tr>
                          <td rowspan="2">No.</td>
                          <td rowspan="2" style="vertical-align : middle;">Aspek</td>
                          <td rowspan="2" style="vertical-align : middle;">Bobot</td>
                          <td colspan="2">Dosen Penguji</td>
                        </tr>
                        <tr>
                          <td>Nilai</td>
                          <td>Bobot x Nilai</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1. </td>
                          <td style="text-align: left;">Penyajian Laporan</td>
                          <td>20%</td>
                          <td><input type="number" class="form-control" name="nilai1" value="{{$bap->nilai1}}"></td>
                          <td><input type="number" class="form-control" disabled name="nilai1_1"></td>
                        </tr>
                        <tr>
                          <td>2. </td>
                          <td style="text-align: left;">Format dan substansi Laporan</td>
                          <td>40%</td>
                          <td><input type="number" class="form-control" name="nilai2" value="{{$bap->nilai2}}"></td>
                          <td><input type="number" class="form-control" disabled name="nilai2_1"></td>
                        </tr>
                        <tr>
                          <td>3. </td>
                          <td style="text-align: left;">Argumentasi</td>
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

                    <p>Kelulusan : Lulus/Tidak Lulus *)</p>

                    <div class="row">
                      <div class="col-md-8"></div>
                      <div class="col-md-4 mt-5">
                        <label style="font-size: 14px;">Tanggal Berita Acara</label>
                        <input type="date" class="form-control" name="tgl" value="{{$bap->tgl}}" style="border: none; border-bottom: 1px solid black; border-radius: 0px;">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-8 mt-5"></div>
                      <div class="col-md-4">
                        <br>
                        <img src="{{asset($dosen->ttd)}}" style="width: 3cm; height: 2cm;">
                        <div>
                          <p style="padding-top:10px; margin-bottom:-2px; font-weight: 600; font-size: 14px;">{{$dosen->nama}}</p>
                          <p style="font-weight: 600; font-size: 14px;">NIP. {{$dosen->nip}}</p>
                        </div>

                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-sm"></i>&nbsp; Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- ./card-body -->

        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>


  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection