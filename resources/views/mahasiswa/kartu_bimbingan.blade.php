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

                  <div class="col-md-4" id="menu-kedua">
                    <a href="{{ route('jurnal') }}" style="text-decoration: none; padding: 17px 50px;">JURNAL HARIAN</a>
                  </div>
                  <div class="col-md-4" id="menu-kedua">
                    <a href="{{ route('periodik') }}" style="text-decoration: none; padding: 17px 50px;">LAPORAN PERIODIK</a>
                  </div>
                  <div class="col-md-4" id="menu-pertama">
                    <a href="{{ route('k-bimbingan') }}" style="text-decoration: none; padding: 17px 50px;">KARTU BIMBINGAN TA</a>
                  </div>
                {{--<div class="col-md-3" id="menu-kedua">
                    <a href="{{ route('k-seminar') }}" style="text-decoration: none; padding: 17px 50px;">KARTU SEMINAR</a>
              </div>--}}

            </div>
            <hr style="margin-top: -9px;">

            <div style="font-size: 16px; font-weight: 600; margin: 20px 0px 40px 0px; text-align:center;">
              FORM 016 <br>
              KARTU KENDALI PEMBIMBINGAN LAPORAN AKHIR
            </div>

            @if (count($bimbingans) == 8)
            <table class="table table-bordered" cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px; text-align: center;">
              <thead>
                <tr>
                  <th width="58%" style="text-align: center">Document</th>
                  <th width="17%" style="text-align: center">Verifikasi Pembimbing</th>
                  <th width="15%" style="text-align: center">Verifikasi Kaprodi</th>
                  <th width="10%" style="text-align: center">Aksi</th>
                  <!-- <th width="20%" style="text-align: center">Paraf Dosen Pembimbing</th> -->
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Kartu Kendali Pembimbingan TA</td>
                  <td>
                    @if ($cek->paraf == 1)
                    <span class="badge badge-success badge-sm">Disetujui</span>
                    @else
                    <span class="badge badge-primary badge-sm">Menunggu</span>
                    @endif
                  </td>
                  <td>
                    @if (File::exists(public_path('pdf/'.$mhs->nim.'/pdf_kartu_bimbingan.pdf')))
                    <span class="badge badge-success badge-sm">Disetujui</span>
                    @else
                    <span class="badge badge-primary badge-sm">Menunggu</span>
                    @endif
                  </td>
                  <td>
                    @if (File::exists(public_path('pdf/'.$mhs->nim.'/pdf_kartu_bimbingan.pdf')))
                    <a href="{{ asset('pdf/'.$mhs->nim.'/pdf_kartu_bimbingan.pdf') }}" class="btn btn-danger btn-sm" download="Kartu_Bimbingan_{{$mhs->nama}}_{{$mhs->nim}}.pdf" style="text-decoration: none; text-align:center;"><i class="fas fa-file-pdf fa-sm"></i> PDF</a>
                    @endif
                  </td>
                  <!-- <td></td> -->
                </tr>
              </tbody>
            </table>
            @else
            <form action="{{ route('bimbingan-submit') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <table cellspacing="0" cellpadding="3" border="1" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                <thead>
                  <tr>
                    <th width="10%" style="text-align: center">Tanggal</th>
                    <th width="90%" style="text-align: center">Kegiatan</th>
                    <!-- <th width="20%" style="text-align: center">Paraf Dosen Pembimbing</th> -->
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="date" name="tanggal" class="form-control"></td>
                    <td><textarea name="kegiatan" rows="3" cols="50" class="form-control"></textarea></td>
                    <!-- <td></td> -->
                  </tr>
                </tbody>
              </table>

              <br>
              <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-save fa-sm"></i>&nbsp; Simpan</button>
            </form>
            @endif
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
              LIST KARTU KENDALI PEMBIMBINGAN LAPORAN AKHIR
            </div>

            <table class="table table-bordered" cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px; text-align: center;">
              <thead>
                <tr>
                  <th width="10%" style="text-align: center;">Pertemuan</th>
                  <th width="20%" style="text-align: center;">Tanggal</th>
                  <th width="65%" style="text-align: center;">Kegiatan</th>
                  <th width="5%" style="text-align: center;">Edit</th>
                  <!-- <th width="20%" style="text-align: center">Paraf Dosen Pembimbing</th> -->
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach ($bimbingans as $bimbingan)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ Carbon\Carbon::parse($bimbingan->tanggal)->translatedFormat('d F Y'); }}</td>
                  <td style="text-align: left;">{{ $bimbingan->kegiatan }}</td>
                  <td><a data-toggle="modal" data-target="#Edit-Bimbingan-{{$bimbingan->id}}" title="edit kegiatan" style="cursor: pointer; color: #005b8f;"><i class="fas fa-edit fa-lg"></i></a></td>
                  <!-- <td></td> -->
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

@if(is_null($bimbingans) == 0)
@foreach ($bimbingans as $bimbingan)
@include('modal.edit-bimbingan')
@endforeach
@endif

@endsection