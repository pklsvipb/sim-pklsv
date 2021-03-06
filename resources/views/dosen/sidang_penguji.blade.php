@extends('layouts.dosen')

@section('user')
<div class="info">
  <a href="#" class="d-block">
    @foreach($datas as $data)
    <span> {{$data->nama}}</span>
    &nbsp;
    @endforeach

    <p style="font-size: 11px; ">Dosen</p>
  </a>
</div>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        @if ($message = Session::get('success'))
        <div id="messageAlert" class="alert alert-success alert-dismissible">
          <i class="fa fa-check"></i> &nbsp; {{ $message }}
        </div>
        @endif
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN BAP PENGUJI SIDANG</div>
              </div>
            </div>
            @if (count($mhs) == 0)
            <div class="div text-secondary text-center">
              <h1 style="font-size: 12px;">Tidak Ada Request Pengisian BAP Penguji Sidang</h1>
            </div>
            @else
            <?php for ($i = 0; $i < count($mhs); $i++) { ?>
              <div class="row" style="background-color: #b3bfff; border-radius: 5px; margin: 0px 10% 2% 10%;">
                <div class="col-md-1 pt-4"></div>
                <div class="col-md-2 pt-4 mb-4 text-center"><i class="fa fa-user-circle fa-4x text-inverse"></i></div>
                <div class="col-md-5 pt-4 mb-4">
                  <h1 style="font-size: 16px; font-weight: 600;">{{$mhs[$i][1]}}</h1>
                  <h1 style="font-size: 14px;">{{$mhs[$i][2]}}</h1>
                  <h1 style="font-size: 14px;">{{$mhs[$i][3]}}</h1>
                </div>
                <div class="col-md-2 pt-4 mt-3">
                  <a href="{{route('sd-bap-j',$mhs[$i][0])}}" type="button" class="btn btn-success btn-md">INPUT BAP</a>
                </div>
                <div class="col-md-2" style="padding: 0px; text-align: right;">
                  @if ($mhs[$i][4] == '')
                  <span class="badge badge-danger badge-lg p-1" style="font-size: 9px;">BELUM SIDANG</span>
                  @else
                    <span class="badge badge-success badge-lg p-1" style="font-size: 9px;">SUDAH SIDANG</span>
                  @endif
                </div>
              </div>
            <?php } ?>
            @endif

          </div>
          <!-- ./card-body -->

        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="title text-center" style="font-weight: 600;"> HISTORY PENGISIAN BAP PENGUJI SIDANG</div>
              </div>
            </div>
            <table class="table text-center" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
              <thead>
                <tr>
                  <td>#</td>
                  <td width="400px"><i class="fas fa-user fa-md"></i>&nbsp; Nama Mahasiswa</td>
                  <td><i class="fas fa-school fa-md"></i>&nbsp; Program Studi</td>
                  <td><i class="fas fa-clock fa-md"></i>&nbsp; Tanggal dan Waktu</td>
                  <td><i class="fas fa-info-circle fa-md"></i>&nbsp; Status</td>
                </tr>
              </thead>
              <tbody>
              <?php 
              $no = 1;
              for ($i=0; $i < count($mhs2);$i++) { ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{$mhs2[$i][2]}}</td>
                  <td>{{$mhs2[$i][3]}}</td>
                  <td>{{date('d-m-Y', strtotime($mhs2[$i][4]))}}</td>
                  <td>
                    <a type="button" href="{{url('dosen/penguji/bap-sd/view-pdf', $mhs2[$i][5])}}" class="btn btn-success btn-sm">Download</a>
                    <a type="button" href="{{url('dosen/penguji/bap-sd/edit', $mhs2[$i][5])}}" class="btn btn-primary btn-sm">Edit</a>
                  </td>
                </tr>
              <?php  
              $no += 1; } ?>
              </tbody>
            </table>

          </div>
          <!-- ./card-body -->

        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>

    <hr>
    
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN BAP PEMBIMBING SIDANG ULANG</div>
              </div>
            </div>
            @if (count($mhs3) == 0)
            <div class="div text-secondary text-center">
              <h1 style="font-size: 12px;">Tidak Ada Request Pengisian BAP Pembimbing Sidang Ulang</h1>
            </div>
            @else
            <?php for ($i = 0; $i < count($mhs3); $i++) { ?>
              <div class="row" style="background-color: #b3bfff; border-radius: 5px; margin: 0px 10% 2% 10%;">
                <div class="col-md-1 pt-4"></div>
                <div class="col-md-2 pt-4 mb-4 text-center"><i class="fa fa-user-circle fa-4x text-inverse"></i></div>
                <div class="col-md-5 pt-4 mb-4">
                  <h1 style="font-size: 16px; font-weight: 600;">{{$mhs3[$i][1]}}</h1>
                  <h1 style="font-size: 14px;">{{$mhs3[$i][2]}}</h1>
                  <h1 style="font-size: 14px;">{{$mhs3[$i][3]}}</h1>
                </div>
                <div class="col-md-2 pt-4 mt-3">
                  <a href="{{route('sd-bap-ju',$mhs3[$i][0])}}" type="button" class="btn btn-success btn-md">INPUT BAP</a>
                </div>
                <div class="col-md-2" style="padding: 0px; text-align: right;">
                  @if ($mhs3[$i][4] == '')
                  <span class="badge badge-danger badge-lg p-1" style="font-size: 9px;">BELUM SIDANG</span>
                  @else
                    <span class="badge badge-success badge-lg p-1" style="font-size: 9px;">SUDAH SIDANG</span>
                  @endif
                </div>
              </div>
            <?php } ?>
            @endif

          </div>
          <!-- ./card-body -->

        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="title text-center" style="font-weight: 600;"> HISTORY PENGISIAN BAP PEMBIMBING SIDANG ULANG</div>
              </div>
            </div>
            <table class="table text-center" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
              <thead>
                <tr>
                  <td>#</td>
                  <td width="400px"><i class="fas fa-user fa-md"></i>&nbsp; Nama Mahasiswa</td>
                  <td><i class="fas fa-school fa-md"></i>&nbsp; Program Studi</td>
                  <td><i class="fas fa-clock fa-md"></i>&nbsp; Tanggal dan Waktu</td>
                  <td><i class="fas fa-info-circle fa-md"></i>&nbsp; Status</td>
                </tr>
              </thead>
              <tbody>
              <?php 
              $no = 1;
              for ($i=0; $i < count($mhs4);$i++) { ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{$mhs4[$i][2]}}</td>
                  <td>{{$mhs4[$i][3]}}</td>
                  <td>{{date('d-m-Y', strtotime($mhs4[$i][4]))}}</td>
                  <td>
                    <a type="button" href="{{url('dosen/penguji/bap-sd-ulang/view-pdf', $mhs4[$i][5])}}" class="btn btn-success btn-sm">Download</a>
                    <a type="button" href="{{url('dosen/penguji/bap-sd-ulang/edit', $mhs4[$i][5])}}" class="btn btn-primary btn-sm">Edit</a>
                  </td>
                </tr>
              <?php  
              $no += 1; } ?>
              </tbody>
            </table>

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