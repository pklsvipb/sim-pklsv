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
                  FORM 005 <br>
                  DAFTAR LOKASI PRAKTIK KERJA LAPANGAN <br>
                  <small style="color: red;"> Pastikan data kalian sama dengan data temen kelompok instansi kalian, jika berbeda maka akan disuruh mengisi form ini kembali</small>
                </div>
                
                @foreach ($datas as $data)

                <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                  <tbody>
                    <tr>
                      <td width="30%">Kabupaten/Kota</td>
                      <td width="1%">:</td>
                      <td width="69%"><input type="text" name="kab" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>Perusahaan/ Instansi</td>
                      <td>:</td>
                      <td><input type="text" name="instansi" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>Bidang Usaha</td>
                      <td>:</td>
                      <td><input type="text" name="usaha" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>:</td>
                      <td><textarea name="alamat" rows="2" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                      <td>Contact Person/Telepon/HP/E-mail</td>
                      <td>:</td>
                      <td><input type="text" name="contact" class="form-control"></td>
                    </tr>
                    <tr>
                      <td>Mahasiswa/NIM</td>
                      <td>:</td>
                      <td><input type="text" value="{{$data->nama}}/{{$data->nim}}" class="form-control" disabled></td>
                    </tr>
                    <tr>
                      <td>Dosen Pembimbing</td>
                      <td>:</td>
                      <td>
                        @if ($data->id_dospem1 == null && $data->id_dospem2 == null)
                        (akan diisi oleh panitia)  
                        @elseif ($data->id_dospem1 != null && $data->id_dospem2 == null)
                        {{$data->getDospem1->nama}}
                        @elseif ($data->id_dospem1 == null && $data->id_dospem2 != null)
                        {{$data->getDospem2->nama}}
                        @else
                        {{$data->getDospem1->nama}} dan {{$data->getDospem2->nama}}
                        @endif
                      </td>
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