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
                  FORM 018 <br>
                  PERSETUJUAN SEMINAR HASIL PKL
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
                        telah layak melaksanakan seminar hasil PKL dengan jadwal:
                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp; Hari</td>
                      <td>:</td>
                      <td>
                        <select name="hari" class="form-control">
                          <option value="senin">Senin</option>
                          <option value="selesa">Selasa</option>
                          <option value="rabu">Rabu</option>
                          <option value="kamis">Kamis</option>
                          <option value="jumat">Jumat</option>
                          <option value="sabtu">Sabtu</option>
                          <option value="minggu">Minggu</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp; Tanggal</td>
                      <td>:</td>
                      <td><input type="date" name="tanggal" class="form-control"></td>
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