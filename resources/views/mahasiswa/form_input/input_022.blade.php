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
                  FORM 022 <br>
                  PERSETUJUAN UJIAN TUGAS AKHIR
                </div>
                    
                @foreach ($datas as $data)

                <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                  <tbody>
                    <tr>
                      <td width="20%">Nama</td>
                      <td>:</td>
                      <td width="80%"><input type="text" value="{{$data->nama}}" class="form-control" disabled></td>
                    </tr>
                    <tr>
                      <td>NIM</td>
                      <td>:</td>
                      <td><input type="text" value="{{$data->nim}}" class="form-control" disabled></td>
                    </tr>
                    <tr>
                      <td>Program Studi</td>
                      <td>:</td>
                      <td><input type="text" value="{{$data->getProdi->nama}}" class="form-control" disabled></td>
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
                        telah layak melaksanakan Ujian Tugas Akhir dan mendaftar untuk ujian Tugas Akhir pada :
                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp; Hari/Tanggal</td>
                      <td>:</td>
                      <td><input type="date" name="tanggal" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp; Waktu</td>
                      <td>:</td>
                      <td><input type="time" name="waktu" class="form-control"></td>
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