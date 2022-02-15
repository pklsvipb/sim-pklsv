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
                  FORM 013 <br>
                  FORM PENGEMBALIAN/BEBAS PEMINJAMAN DOKUMEN, ALAT <br>
                  DAN KEWAJIBAN LAIN DARI PERUSAHAAN/INSTANSI
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
                      <td>{{$data->nama}}</td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp; NIM</td>
                      <td>:</td>
                      <td>{{$data->nim}}</td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp; Program Studi</td>
                      <td>:</td>
                      <td>{{$data->getProdi->nama}}</td>
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