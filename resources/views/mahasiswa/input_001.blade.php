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
                <div class="title text-center" style="font-weight: 600;">FORM 001 USULAN MINAT BIDANG KAJIAN DAN LOKASI PKL</div>

                @foreach ($datas as $data)

                <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                  <tbody>
                    <tr>
                      <td>Nama Penyaji</td>
                      <td>:</td>
                      <td>{{$data->nama}}</td>
                    </tr>
                    <tr>
                      <td>NIM </td>
                      <td>:</td>
                      <td>{{$data->nim}}</td>
                    </tr>
                  </tbody>
                </table>

                <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                  <tbody>
                    <tr>
                      <td colspan="2">Usulan Minat Bidang dan Kajian</td>
                    </tr>
                    <tr>
                      <td>1. </td>
                      <td><input type="text" class="form-control"></td>
                    </tr>
                  </tbody>
                </table>

                <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                  <tbody>
                    <tr>
                      <td colspan="2">Usulan Lokasi PKL</td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp; Nama Instansi Perusahaan</td>
                      <td width="70%"><input type="text" name="instansi" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp; Alamat Lengkap</td>
                      <td><textarea name="alamat" rows="2" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp; Nama Pimpinan Perusahaan/ Instansi</td>
                      <td><input type="text" name="pimpinan" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp; Contact Person/Telepon/HP/E-mail</td>
                      <td><input type="text" name="contact" class="form-control"></td>
                    </tr>
                  </tbody>
                </table>

                <div class="row">
                  <div class="col-md-8"></div>
                  <div class="col-md-4 mt-5">
                    <label style="font-size: 14px;">Tanggal</label>
                    <input type="date" class="form-control" name="tgl" style="border: none; border-bottom: 1px solid black; border-radius: 0px;">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-8 mt-5"></div>
                  <div class="col-md-4">
                    <br>
                    <img src="{{asset($data->ttd)}}" width="100%">
                    <div>
                      <p style="padding-top:10px; margin-bottom:-2px; font-weight: 600; font-size: 14px; text-align: center;">({{$data->nama}})</p>
                      <p style="font-weight: 600; font-size: 14px; padding-top: 10px;"><input type="text" name="telp" placeholder="Nomor Telephone" class="form-control"></p>
                    </div>
                  </div>
                </div>
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