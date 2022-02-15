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
                  FORM 011 <br>
                  FORM PRESENTASI HASIL PKL
                </div>
                
                @foreach ($datas as $data)

                <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                  <tbody>
                    <tr>
                      <td width="20%">Nama Perusahaan/ Instansi</td>
                      <td>:</td>
                      <td width="80%;"><input type="text" name="instansi" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>:</td>
                      <td><textarea name="alamat" rows="2" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                      <td>Pembimbing Lapangan</td>
                      <td>:</td>
                      <td><input type="text" name="pemlap" class="form-control"></td>
                    </tr>
                      <tr>
                        <td colspan="3">
                          <br><br>
                        </td>
                      </tr>
                    <tr>
                      <td colspan="3">
                        Dengan ini Pembimbing Lapangan PKL menyatakan bahwa mahasiswa berikut :
                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp; Nama</td>
                      <td>:</td>
                      <td><input type="text" value="{{$data->nama}}" class="form-control" disabled></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp; NIM</td>
                      <td>:</td>
                      <td><input type="text" value="{{$data->nim}}" class="form-control" disabled></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp; Program Studi</td>
                      <td>:</td>
                      <td><input type="text" value="{{$data->getProdi->nama}}" class="form-control" disabled></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp; Tanggal Presentasi</td>
                      <td>:</td>
                      <td><input type="date" name="tanggal" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp; Judul Laporan Akhir</td>
                      <td>:</td>
                      <td><textarea name="judul" rows="2" class="form-control"></textarea></td>
                    </tr>
                  </tbody>
                </table>
                
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