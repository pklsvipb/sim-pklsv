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
                  FORM 015 <br>
                  LAPORAN SUPERVISI PKL
                </div>
                    
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
                      <td>Bidang Usaha/Kegiatan</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="bidang1" class="form-control">
                        <input type="text" name="bidang2" class="form-control" placeholder="Isi jika bidang usaha lebih dari satu">
                      </td>
                    </tr>
                    <tr>
                      <td>Dosen Supervisi</td>
                      <td>:</td>
                      <td>
                        <select name="dosen" class="form-control">
                          <option value="" disabled>Pilih Dosen Supervisi</option>
                          @foreach ($dosens as $dosen)
                          <option value="{{$dosen->id}}">{{$dosen->nama}}</option>
                          @endforeach
                        </select> 
                      </td>
                    </tr>
                    <tr>
                      <td>Tanggal Supervisi</td>
                      <td>:</td>
                      <td><input type="date" name="tanggal" class="form-control"></td>
                    </tr>
                  </tbody>
                </table>
             
                <br>
                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: ;"><i class="fas fa-save fa-sm"></i>&nbsp; Kirim</button>

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