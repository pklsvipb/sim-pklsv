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

                  <div class="col-md-4" id="menu-pertama">
                    <a href="{{ route('jurnal') }}" style="text-decoration: none; padding: 17px 50px;">JURNAL HARIAN</a>
                  </div>
                  <div class="col-md-4" id="menu-kedua">
                    <a href="{{ route('periodik') }}" style="text-decoration: none; padding: 17px 50px;">LAPORAN PERIODIK</a>
                  </div>
                  <div class="col-md-4" id="menu-kedua">
                    <a href="{{ route('k-bimbingan') }}" style="text-decoration: none; padding: 17px 50px;">KARTU BIMBINGAN TA</a>
                  </div>
                  {{--<div class="col-md-3" id="menu-kedua">
                    <a href="{{ route('k-seminar') }}" style="text-decoration: none; padding: 17px 50px;">KARTU SEMINAR</a>
                  </div>--}}

                </div>
                <hr style="margin-top: -9px;">

                <form action="{{ route('jurnal-submit') }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div style="font-size: 16px; font-weight: 600; margin: 20px 0px 40px 0px; text-align:center;">
                    FORM 009 <br>
                    JURNAL HARIAN PKL
                  </div>

                  <table cellspacing="0" cellpadding="3" border="1" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                    <thead>
                      <tr>
                        <!--<th width="10%" style="text-align: center">Hari</th>-->
                        <th width="20%" style="text-align: center">Tanggal</th>
                        <th width="10%" style="text-align: center">Jam Mulai</th>
                        <th width="10%" style="text-align: center">Jam Selesai</th>
                        <th width="60%" style="text-align: center">Kegiatan</th>
                        <!-- <th width="10%" style="text-align: center">Paraf Pembimbing Lapangan</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        {{-- <td>
                          <select name="hari" class="form-control">
                            <option value="senin">Senin</option>
                            <option value="selesa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jumat</option>
                            <option value="sabtu">Sabtu</option>
                            <option value="minggu">Minggu</option>
                          </select>
                        </td> --}}
                        <td><input type="date" name="tanggal" class="form-control"></td>
                        <td><input type="time" name="waktu_mulai" class="form-control"></td>
                        <td><input type="time" name="waktu_selesai" class="form-control"></td>
                        <td><textarea name="kegiatan" rows="3" cols="50" class="form-control"></textarea></td>
                        <!-- <td></td> -->
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
                @if (File::exists(public_path('pdf/'.$mhs->nim.'/pdf_jurnal_harian.pdf')))
                  <a href="{{ asset('pdf/'.$mhs->nim.'/pdf_jurnal_harian.pdf') }}" class="btn btn-danger btn-sm" download="pdf_jurnal_harian.pdf" style="text-decoration: none; float: right;"><i class="fas fa-file-pdf fa-lg" style="color: white;"></i> <span style="font-size: 12px; color: white;">File Upload</span></a>
                @endif
              </div>
              <div class="col-md-12">
                <div style="font-size: 16px; font-weight: 600; margin: 20px 0px 40px 0px; text-align:center;">
                  LIST JURNAL HARIAN PKL<br><br>
                  @if(count($jurnals) != 0)
                  <span>
                    <a href="{{route('download-jurnal')}}" class="btn btn-danger btn-sm" style="width: 15%; margin-right: auto; padding: 2px;">Unduh PDF</a>
                    <a data-toggle="modal" data-target="#Upload-Jurnal" title="Upload pdf yang sudh diparaf dan ditandatangani" class="btn btn-primary btn-sm" style="width: 15%; margin-right: auto; padding: 2px;">Upload PDF</a>
                  </span>
                  @endif
                </div>

                <table class="table table-bordered" cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px; text-align: center;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th width="10%" style="text-align: center;">Hari</th>
                      <th width="20%" style="text-align: center;">Tanggal</th>
                      <th width="20%" style="text-align: center;">Waktu</th>
                      <th width="50%" style="text-align: center;">Kegiatan</th>
                      <th width="10%" style="text-align: center;">Edit</th>
                      <!-- <th width="10%" style="text-align: center">Paraf Pembimbing Lapangan</th> -->
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1; ?>
                    @foreach($jurnals as $jurnal)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ Carbon\Carbon::parse($jurnal->tanggal)->translatedFormat('l'); }}</td>
                      <td>{{ Carbon\Carbon::parse($jurnal->tanggal)->translatedFormat('d F Y'); }}</td>
                      <td>{{ $jurnal->waktu_mulai }} - {{ $jurnal->waktu_selesai }}</td>
                      <td style="text-align: left;">{{ $jurnal->kegiatan }}</td>
                      <td><a data-toggle="modal" data-target="#Edit-Jurnal-{{$jurnal->id}}" title="edit kegiatan" style="cursor: pointer; color: #005b8f;"><i class="fas fa-edit fa-lg"></i></a></td>
                      <!-- <td></td> -->
                    </tr>
                    <?php $no += 1; ?>
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

@if(is_null($jurnals) == 0) 
@foreach ($jurnals as $jurnal) 
@include('modal.edit-jurnal') 
@endforeach 
@endif 


@include('modal.upload-jurnal') 

@endsection