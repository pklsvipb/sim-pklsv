@extends('layouts.mahasiswa')

@section('user')
<div class="info">
  <a href="#" class="d-block">
    @foreach($datas as $data)
    <span> {{$data->nama}}</span>
    &nbsp;
    @endforeach

    <p style="font-size: 11px; ">Mahasiswa</p>
  </a>
</div>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    @if ($message = Session::get('success'))
    <div id="messageAlert" class="alert alert-success alert-dismissible">
      <i class="fa fa-check"></i> &nbsp; {{ $message }}
    </div>
    @endif

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="row text-center">

                  <style>
                    #menu-pertama {
                      padding: 7px 0px;
                      margin-bottom: 10px;
                      border-bottom: 2px solid black;
                    }

                    #menu-pertama a {
                      color: black;
                      font-weight: 600;
                      font-size: 13px;
                    }

                    #menu-pertama:hover {
                      background: #f8f9f9;
                    }

                    #menu-kedua {
                      padding: 7px 0px;
                      margin-bottom: 10px;
                    }

                    #menu-kedua a {
                      color: black;
                      font-weight: 600;
                      font-size: 13px;
                    }

                    #menu-kedua:hover {
                      background: #f8f9f9;
                    }
                  </style>

                  <div class="col-md-3" id="menu-kedua">
                    <a href="{{ route('jurnal') }}" style="text-decoration: none; padding: 17px 50px;">JURNAL HARIAN</a>
                  </div>
                  <div class="col-md-3" id="menu-kedua">
                    <a href="{{ route('periodik') }}" style="text-decoration: none; padding: 17px 50px;">LAPORAN PERIODIK</a>
                  </div>
                  <div class="col-md-3" id="menu-kedua">
                    <a href="{{ route('k-bimbingan') }}" style="text-decoration: none; padding: 17px 50px;">KARTU BIMBINGAN TA</a>
                  </div>
                  <div class="col-md-3" id="menu-pertama">
                    <a href="{{ route('k-seminar') }}" style="text-decoration: none; padding: 17px 50px;">KARTU SEMINAR</a>
                  </div>
                </div>
                <hr style="margin-top: -9px;">

                <div style="font-size: 16px; font-weight: 600; margin: 20px 0px 40px 0px; text-align:center;">
                  FORM 017 <br>
                  KARTU SEMINAR
                </div>

                <form action="{{ route('k-seminar-submit') }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <table cellspacing="0" cellpadding="3" border="1" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                    <thead>
                      <tr>
                        <th width="10%" style="text-align: center">Hari/Tanggal</th>
                        <th width="5%" style="text-align: center">Waktu</th>
                        <th width="20%" style="text-align: center">Nama Pemrasaran</th>
                        <th width="20%" style="text-align: center">NIM</th>
                        <th width="30%" style="text-align: center">Moderator</th>
                        <th width="10%" style="text-align: center">Paraf</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="date" name="tanggal" class="form-control"></td>
                        <td><input type="time" name="waktu" class="form-control"></td>
                        <td><input type="text" name="nama_pem" class="form-control"></td>
                        <td><input type="text" name="nim_pem" class="form-control"></td>
                        <td>
                          <select name="dosen" class="form-control">
                            <option value="" disabled>Pilih Dosen Supervisi</option>
                            @foreach ($dosens as $dosen)
                            <option value="{{$dosen->id}}">{{$dosen->nama}}</option>
                            @endforeach
                          </select>
                        </td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>

                  <br>
                  <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-save fa-sm"></i>&nbsp; Simpan</button>

                </form>
              </div>
            </div>
          </div>
          <!-- ./card-body -->
        </div>
        <!-- /.card -->

        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div style="font-size: 16px; font-weight: 600; margin: 20px 0px 40px 0px; text-align:center;">
                  LIST KARTU SEMINAR
                </div>

                <table cellspacing="0" cellpadding="3" border="1" style="font-size: .875rem; font-weight: 600; margin: 50px 0px; text-align: center;">
                  <thead>
                  <tr>
                        <th width="20%" style="text-align: center">Hari/Tanggal</th>
                        <th width="5%" style="text-align: center">Waktu</th>
                        <th width="20%" style="text-align: center">Nama Pemrasaran</th>
                        <th width="10%" style="text-align: center">NIM</th>
                        <th width="30%" style="text-align: center">Moderator</th>
                        <th width="10%" style="text-align: center">Paraf</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    @foreach ($seminars as $seminar)
                    <tr>
                      <td>{{ Carbon\Carbon::parse($seminar->tanggal)->translatedFormat('l/d F Y'); }}</td>
                      <td>{{ $seminar->waktu }}</td>
                      <td>{{ $seminar->nama_pemrasaran }}</td>
                      <td>{{ $seminar->nim_pemrasaran }}</td>
                      <td>{{ $seminar->getDosen->nama }}</td>
                      <td></td>
                    </tr>
                    <?php $i += 1; ?>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- ./card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->

@endsection