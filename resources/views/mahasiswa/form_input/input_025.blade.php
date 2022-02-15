@extends('layouts.mahasiswa')

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
                <div class="title text-center" style="font-weight: 600;">
                  FORM 025 <br>
                  PENILAIAN LAPORAN AKHIR
                </div>
                    
                @foreach ($datas as $data)

                <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                  <tbody>
                    <tr>
                      <td width="20%">Nama Mahasiswa</td>
                      <td>:</td>
                      <td width="80%"><input type="text" value="{{$data->nama}}" class="form-control" disabled></td>
                    </tr>
                    <tr>
                      <td>NIM</td>
                      <td>:</td>
                      <td><input type="text" value="{{$data->nim}}" class="form-control" disabled></td>
                    </tr>
                    <tr>
                      <td>Judul Laporan PKL</td>
                      <td>:</td>
                      <td><textarea name="judul" rows="2" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                      <td colspan="3"><br><br></td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        a. Penilaian Laporan Akhir :
                      </td>
                    </tr>
                  </tbody>
                </table>
                
                <div class="row">
                  <div class="col-md-12" style="padding-left: 50px;">
                    <table border="1" cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin-top: -50px;">
                      <tr>
                        <th width="3%" style="text-align: center">No.</th>
                        <th width="20%" style="text-align: center">Aspek</th>
                        <th width="10%" style="text-align: center">Bobot</th>
                        <th width="10%" style="text-align: center">Nilai</th>
                        <th width="10%" style="text-align: center">Bobot x Nilai</th>
                      </tr>
                      <tr>
                        <td style="text-align: center">1. </td>
                        <td>Format Laporan</td>
                        <td style="text-align: center">10%</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td style="text-align: center">2. </td>
                        <td>Substansi Laporan</td>
                        <td style="text-align: center">80%</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td style="text-align: center">3. </td>
                        <td>Lain-lain (kerajinan, sopan santun, dan lain-lain)</td>
                        <td style="text-align: center">10%</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td colspan="2" style="text-align: center">Total </td>
                        <td style="text-align: center">100%</td>
                        <td></td>
                        <td></td>
                      </tr>
                    </table>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12" style="font-size: .875rem; font-weight: 600; margin-bottom: 50px;">
                    b. Nilai Jurnal Harian : (diisi oleh dosen pembimbing)
                  </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: ;"><i class="fas fa-save fa-sm"></i>&nbsp; Kirim</button>

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


  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection