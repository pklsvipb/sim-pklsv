@extends('layouts.dosen')

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
                <div class="title text-center" style="font-weight: 600;"> EDIT PENGISIAN BAP KOLOKIUM </div>
                <div class="div">
                  <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                    <tbody>
                      <tr>
                        <td>Nama Penyaji</td>
                        <td>:</td>
                        <td>{{$mhs->nama}}</td>
                      </tr>
                      <tr>
                        <td>NIM </td>
                        <td>:</td>
                        <td>{{$mhs->nim}}</td>
                      </tr>
                      <tr>
                        <td>Hari/Tanggal</td>
                        <td>:</td>
                        <td>{{date('d-m-Y', strtotime($data->tgl))}}</td>
                      </tr>
                      <tr>
                        <td>Waktu</td>
                        <td>:</td>
                        <td>{{date('H:i', strtotime($data->waktu))}}</td>
                      </tr>
                      <tr>
                        <td>Rencana Tugas Akhir</td>
                        <td>:</td>
                        <td>{{$data->judul}}</td>
                      </tr>
                      <tr>
                        <td>Lokasi Tugas Akhir</td>
                        <td>:</td>
                        <td>{{$data->lokasi}}</td>
                      </tr>
                    </tbody>
                  </table>

                  <form action="{{ url('/dosen/update/kolokium-bap-moderator', $bap->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="text" name="id_mhs" value="{{$mhs->id}}" hidden>
                    <label style="font-size: 14px;">Kelayakan : </label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="kelayakan" id="ya" value="ya" {{ ($bap->kelayakan == "ya") ? "checked" : "" }}>
                      <label class="form-check-label" for="ya">
                        Ya
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="kelayakan" id="tidak" value="tidak" {{ ($bap->kelayakan == "tidak") ? "checked" : "" }}>
                      <label class="form-check-label" for="tidak">
                        Tidak
                      </label>
                    </div>

                    <div class="row">
                      <div class="col-md-8"></div>
                      <div class="col-md-4 mt-5">
                        <label style="font-size: 14px;">Tanggal Berita Acara</label>
                        <input type="date" class="form-control" name="tgl" value="{{$bap->tgl}}" style="border: none; border-bottom: 1px solid black; border-radius: 0px;">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-8 mt-5"></div>
                      <div class="col-md-4">
                        <br>
                        <img src="{{asset($dosen->ttd)}}" width="100%">
                        <div>
                          <p style="padding-top:10px; margin-bottom:-2px; font-weight: 600; font-size: 14px;">{{$dosen->nama}}</p>
                          <p style="font-weight: 600; font-size: 14px;">NIP. {{$dosen->nip}}</p>
                        </div>

                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-sm"></i>&nbsp; Update</button>
                  </form>
                </div>
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