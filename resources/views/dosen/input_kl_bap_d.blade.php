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
                <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN BAP KOLOKIUM </div>
                @foreach ($datas as $data)

                @if ($data->ttd != null)
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
                        <td>{{date('d-m-Y', strtotime($kode->tgl))}}</td>
                      </tr>
                      <tr>
                        <td>Waktu</td>
                        <td>:</td>
                        <td>{{date('H:i', strtotime($kode->waktu))}}</td>
                      </tr>
                      <tr>
                        <td>Rencana Tugas Akhir</td>
                        <td>:</td>
                        <td>{{$kode->judul}}</td>
                      </tr>
                      <tr>
                        <td>Lokasi Tugas Akhir</td>
                        <td>:</td>
                        <td>{{$kode->lokasi}}</td>
                      </tr>
                    </tbody>
                  </table>
    
                  <form action="{{ url('/dosen/submit/kolokium-bap-dospem', $kode->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="text" name="id_mhs" value="{{$mhs->id}}" hidden>
                    <label style="font-size: 14px;">Kelayakan : </label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="kelayakan" id="ya" value="ya" checked>
                      <label class="form-check-label" for="ya">
                        Ya
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="kelayakan" id="tidak" value="tidak">
                      <label class="form-check-label" for="tidak">
                        Tidak
                      </label>
                    </div>

                    <label style="font-size: 14px;">Keputusan : </label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="keputusan" id="proses" value="proses" checked>
                      <label class="form-check-label" for="proses">
                        Proses PKL
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="keputusan" id="ulang" value="ulang">
                      <label class="form-check-label" for="ulang">
                        Membuat ulang rencana PKL
                      </label>
                    </div>

                    <div class="row">
                      <div class="col-md-8"></div>
                      <div class="col-md-4 mt-5">
                        <label style="font-size: 14px;">Tanggal Berita Acara</label>
                        <input type="date" class="form-control" name="tgl" value="{{$kode->tgl}}" style="border: none; border-bottom: 1px solid black; border-radius: 0px;">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-8 mt-5"></div>
                      <div class="col-md-4" style="text-align: center;">
                        <br>
                        <img src="{{asset($data->ttd)}}" style="width: 3cm; height: 2cm;">
                        <div>
                          <p style="padding-top:10px; margin-bottom:-2px; font-weight: 600; font-size: 14px; text-align: left;">{{$data->nama}}</p>
                          <p style="font-weight: 600; font-size: 14px; text-align: left;">NIP. {{$data->nip}}</p>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-sm"></i>&nbsp; Kirim</button>
                  </form>
                </div>

                @else     
                <div class="row">
                  <div class="col-md-12">
                    <p style="text-align: center; margin-top:50px; color:red;"> Isi Tanda Tangan terlebih dahulu, pada menu biodata. </p>
                  </div>
                </div>
                @endif
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