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
                  FORM 029 <br>
                  BERITA ACARA KOLOKIUM MODERATOR
                </div>

                <form action="{{ route('form029-moderator-pdf', $id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  @foreach ($datas as $data)

                  <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                    <tbody>
                      <tr>
                        <td width="20%">Nama Penyaji</td>
                        <td>:</td>
                        <td width="80%"><input type="text" value="{{$data->nama}}" class="form-control" disabled></td>
                      </tr>
                      <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td><input type="text" value="{{$data->nim}}" class="form-control" disabled></td>
                      </tr>
                      <tr>
                        <td>Hari/Tanggal</td>
                        <td>:</td>
                        <td><input type="date" name="tanggal" class="form-control"></td>
                      </tr>
                      <tr>
                        <td>Waktu</td>
                        <td>:</td>
                        <td><input type="time" name="waktu" class="form-control"></td>
                      </tr>
                      <tr>
                        <td>Rencana Tugas Akhir</td>
                        <td>:</td>
                        <td><textarea name="judul" rows="2" class="form-control"></textarea></td>
                      </tr>
                      <tr>
                        <td>Lokasi Tugas Akhir</td>
                        <td>:</td>
                        <td><textarea name="lokasi" rows="2" class="form-control"></textarea></td>
                      </tr>
                    </tbody>
                  </table>

                  <br>
                  <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-save fa-sm"></i>&nbsp; Kirim</button>

                  @endforeach
                </form>
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