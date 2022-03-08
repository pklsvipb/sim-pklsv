@extends('layouts.dosen')

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11" style="margin: auto;">
        @foreach ($datas as $data)

        @if ($data->ttd != null)
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN BAP SEMINAR </div>
                
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
                        <td>Judul Tugas Akhir</td>
                        <td>:</td>
                        <td>{{$kode->judul}}</td>
                      </tr>
                    </tbody>
                  </table>

                  <form action="{{ url('/dosen/submit/seminar-bap-moderator', $kode->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <p style="font-size: .875rem; font-weight: 600;">Penilaian :</p>
                    <table class="table table-bordered text-center" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                      <input type="text" name="id_mhs" value="{{$mhs->id}}" hidden>
                    <thead>
                        <tr>
                          <td rowspan="2">No.</td>
                          <td rowspan="2" style="vertical-align : middle;">Aspek</td>
                          <td rowspan="2" style="vertical-align : middle;">Bobot</td>
                          <td colspan="2">Dosen Moderator</td>
                        </tr>
                        <tr>
                          <td>Nilai</td>
                          <td>Bobot x Nilai</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1. </td>
                          <td style="text-align: left;">Format dan substansi makalah</td>
                          <td>30%</td>
                          <td><input type="number" class="form-control" name="nilai1"></td>
                          <td><input type="number" class="form-control" disabled name="nilai1_1"></td>
                        </tr>
                        <tr>
                          <td>2. </td>
                          <td style="text-align: left;">Penyajian makalah</td>
                          <td>30%</td>
                          <td><input type="number" class="form-control" name="nilai2"></td>
                          <td><input type="number" class="form-control" disabled name="nilai2_1"></td>
                        </tr>
                        <tr>
                          <td>3. </td>
                          <td style="text-align: left;">Argumentasi dalam forum diskusi</td>
                          <td>40%</td>
                          <td><input type="number" class="form-control" name="nilai3"></td>
                          <td><input type="number" class="form-control" disabled name="nilai3_1"></td>
                        </tr>
                        <tr>
                          <td colspan="2">Total</td>
                          <td>100%</td>
                          <td><input type="number" class="form-control" disabled name="total1"></td>
                          <td><input type="number" class="form-control" disabled name="total2"></td>
                        </tr>
                      </tbody>
                    </table>
                    </form>
                </div>
              </div>
            </div>
          </div>
          <!-- ./card-body -->

        </div>
        <!-- /.card -->

        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN PEMBAHAS SEMINAR </div>
                <div class="div">
                  <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                    <tbody>
                      <tr>
                        <td>Nama Pembahas</td>
                        <td>:</td>
                        <td>Pembahas</td>
                      </tr>
                      <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td>NIM Pembahas</td>
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
                        <td>Judul Makalah</td>
                        <td>:</td>
                        <td>{{$kode->judul}}</td>
                      </tr>
                      <tr></tr>
                      <tr>
                        <td>Nilai</td>
                        <td>:</td>
                        <td><input type="number" name="nilai_pembahas" class="form-control"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- ./card-body -->

        </div>
        <!-- /.card -->

        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN FORM PENILAIAN FORUM SEMINAR </div>
                <div class="div">
                  <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                    <tbody>
                      <tr>
                        <td>Hari/Tanggal</td>
                        <td>:</td>
                        <td>{{date('d-m-Y', strtotime($kode->tgl))}}</td>
                      </tr>
                      <tr>
                        <td>Nama Pemrasaran</td>
                        <td>:</td>
                        <td>{{$mhs->nama}}</td>
                      </tr>
                      <tr>
                        <td>NIM </td>
                        <td>:</td>
                        <td>{{$mhs->nim}}</td>
                      </tr> 
                    </tbody>
                  </table>
                  
                  <table class="table table-bordered text-center" cellspacing="0" cellpadding="0" style="font-size: .875rem;">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>NIM</th>
                        <th>NILAI</th>
                        <th>KETERANGAN</th>
                      </tr>  
                    </thead>
                    <tbody>
                      <tr>
                        <td>NO</td>
                        <td>
                          <input type="text" name="nama_forum[]" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="nim_forum[]" class="form-control">
                        </td>
                        <td>
                          <input type="number" name="nilai_forum[]" class="form-control">
                        </td>
                        <td>
                          <textarea name="ket_forum[]" rows="1" class="form-control"></textarea>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- ./card-body -->

        </div>
        <!-- /.card -->

        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="div">
                  <form action="{{ url('/dosen/submit/seminar-bap-moderator', $kode->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-8"></div>
                      <div class="col-md-4 mt-5">
                        <label style="font-size: 14px;">Tanggal Pengisian</label>
                        <input type="date" class="form-control" name="tgl" style="border: none; border-bottom: 1px solid black; border-radius: 0px;">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-8 mt-5"></div>
                      <div class="col-md-4">
                        <br>
                        <img src="{{asset($data->ttd)}}" style="width: 3cm; height: 2cm;">
                        <div>
                          <p style="padding-top:10px; margin-bottom:-2px; font-weight: 600; font-size: 14px;">{{$data->nama}}</p>
                          <p style="font-weight: 600; font-size: 14px;">NIP. {{$data->nip}}</p>
                        </div>
                      </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-save fa-sm"></i>&nbsp; Kirim</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- ./card-body -->

        </div>
        <!-- /.card -->

        @else    
        <div class="card">
          <div class="card-body"> 
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN BAP SEMINAR </div>
                <div class="row">
                  <div class="col-md-12">
                    <p style="text-align: center; margin-top:50px; color:red;"> Isi Tanda Tangan terlebih dahulu, pada menu biodata. </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
        @endforeach
        
      </div>
      <!-- /.col -->
    </div>


  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection