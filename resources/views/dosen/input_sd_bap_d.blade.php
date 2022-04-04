@extends('layouts.dosen')

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11" style="margin: auto;">
        @foreach ($datas as $data)
              
        @if ($data->ttd != null)
        <form action="{{ url('/dosen/submit/sidang-bap-dospem', $kode->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 mb-5">
                  <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN BAP SIDANG </div>
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
                          <td>{{$kode->judul}}</td>
                        </tr>
                        <tr>
                          <td>Hari/Tanggal Ujian</td>
                          <td>:</td>
                          <td>{{date('d-m-Y', strtotime($kode->tgl))}}</td>
                        </tr>
                        <tr>
                          <td>Waktu Ujian</td>
                          <td>:</td>
                          <td>{{date('H:i', strtotime($kode->waktu))}}</td>
                        </tr>
                      </tbody>
                    </table>

                    <p style="font-size: .875rem; font-weight: 600;">Penilaian :</p>
                    <table class="table table-bordered text-center" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                      <input type="text" name="id_mhs" value="{{$mhs->id}}" hidden>
                      <input type="text" name="ket" value="sd" hidden>
                    <thead>
                        <tr>
                          <td rowspan="2">No.</td>
                          <td rowspan="2" style="vertical-align : middle;">Aspek</td>
                          <td rowspan="2" style="vertical-align : middle;">Bobot</td>
                          <td colspan="2">Dosen Pembimbing</td>
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
                          <td><input type="number" class="form-control" required name="nilai1"></td>
                          <td><input type="number" class="form-control" disabled name="nilai1_1"></td>
                        </tr>
                        <tr>
                          <td>2. </td>
                          <td style="text-align: left;">Format dan substansi Laporan</td>
                          <td>40%</td>
                          <td><input type="number" class="form-control" required name="nilai2"></td>
                          <td><input type="number" class="form-control" disabled name="nilai2_1"></td>
                        </tr>
                        <tr>
                          <td>3. </td>
                          <td style="text-align: left;">Argumentasi</td>
                          <td>40%</td>
                          <td><input type="number" class="form-control" required name="nilai3"></td>
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
                  <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN FORM 025 PENILAIAN LAPORAN AKHIR</div>
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
                          <td>Judul Laporan</td>
                          <td>:</td>
                          <td>{{$kode->judul}}</td>
                        </tr>
                      </tbody>
                    </table>

                    <p style="font-size: .875rem; font-weight: 600;">a. Penilaian Laporan Akhir</p>
                    <table class="table table-bordered text-center" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                      <input type="text" name="id_mhs" value="{{$mhs->id}}" hidden>
                      <input type="text" name="form_ket" value="sd" hidden>
                      <thead>
                        <tr>
                          <td>No.</td>
                          <td>Aspek</td>
                          <td>Bobot</td>
                          <td>Nilai</td>
                          <td>Bobot x Nilai</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1. </td>
                          <td style="text-align: left;">Format Laporan</td>
                          <td>10%</td>
                          <td><input type="number" class="form-control" name="form_nilai1" required></td>
                          <td><input type="number" class="form-control" disabled name="form_nilai1_1"></td>
                        </tr>
                        <tr>
                          <td>2. </td>
                          <td style="text-align: left;">Substansi Laporan</td>
                          <td>80%</td>
                          <td><input type="number" class="form-control" name="form_nilai2" required></td>
                          <td><input type="number" class="form-control" disabled name="form_nilai2_1"></td>
                        </tr>
                        <tr>
                          <td>3. </td>
                          <td style="text-align: left;">Lain-lain (kerajinan, sopan santun, dan lain-lain)</td>
                          <td>10%</td>
                          <td><input type="number" class="form-control" name="form_nilai3" required></td>
                          <td><input type="number" class="form-control" disabled name="form_nilai3_1"></td>
                        </tr>
                        <tr>
                          <td colspan="2">Total</td>
                          <td>100%</td>
                          <td><input type="number" class="form-control" disabled name="form_total1"></td>
                          <td><input type="number" class="form-control" disabled name="form_total2"></td>
                        </tr>
                      </tbody>
                    </table>

                    <br>
                    <table>
                      <tr>
                        <td style="font-size: .875rem; font-weight: 600;">b. Nilai Jurnal Harian   : </td>
                        <td><input type="number" class="form-control" name="nilai_jurnal" required></td>
                      </tr>
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
                <div class="col-md-8"></div>
                <div class="col-md-4 mt-5">
                  <label style="font-size: 14px;">Tanggal Pengisian</label>
                  <input type="date" class="form-control" value="{{$kode->tgl}}" name="tgl" style="border: none; border-bottom: 1px solid black; border-radius: 0px;">
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 mt-5"></div>
                <div class="col-md-4">
                  <br>
                  <img src="{{asset($data->ttd)}}" style="width: 3cm; height: 2cm;">
                  <div>
                    <p style="padding-top:10px; margin-bottom:-2px; font-weight: 600; font-size: 14px;">{{$data->nama}}</p>
                    <p style="font-weight: 600; font-size: 14px;">NIP {{$data->nip}}</p>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-sm"></i>&nbsp; Kirim</button>
            </div>
            <!-- ./card-body -->
          </div>
          <!-- /.card -->
        </form>

        @else     
        <div class="col-md-12 mb-5">
          <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN BAP SIDANG </div>
            <div class="row">
              <div class="col-md-12">
                <p style="text-align: center; margin-top:50px; color:red;"> Isi Tanda Tangan terlebih dahulu, pada menu biodata. </p>
              </div>
            </div>
          </div>
        </div>
        @endif
        @endforeach
      </div>
      <!-- /.col -->
    </div>


  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection