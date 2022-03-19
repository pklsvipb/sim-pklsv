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
                <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN SUPERVISI FORM 004</div>
              </div>
            </div>
            @if (count($mhs) == 0)
            <div class="div text-secondary text-center">
              <h1 style="font-size: 12px;">Tidak Ada Request Pengisian Supervisi Form 004</h1>
            </div>
            @else
            <?php for ($i = 0; $i < count($mhs); $i++) { ?>
              <div class="row" style="background-color: #b3bfff; border-radius: 5px; margin: 0px 10% 2% 10%;">
                <div class="col-sm-2 pt-4 mb-4 text-center"><i class="fa fa-calendar-week fa-3x text-inverse"></i></div>
                <div class="col-sm-6 pt-4 mt-2">
                  <h1 style="font-size: 13px; font-weight: 600;">{{$mhs[$i][1]}}</h1>
                  <h1 style="font-size: 13px;">{{$mhs[$i][2]}}</h1>
                </div>
                <div class="col-sm-4 pt-4 mt-2">
                  <a class="btn btn-secondary btn-md" data-toggle="modal" data-target="#Detail-{{$mhs[$i][0]}}" title="Detail Mahasiswa" type="button"> 
                      <i class="fa fa-search fa-sm text-inverse"></i> Mahasiswa 
                  </a>
                  <a href="{{route('input-form-004',$mhs[$i][0])}}" type="button" class="btn btn-success btn-md">INPUT</a>
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
                <div class="title text-center" style="font-weight: 600;"> HISTORY SUPERVISI FORM 004</div>
              </div>
            </div>
            <table class="table text-center" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
              <thead>
                <tr>
                  <td>#</td>
                  <td width="400px"><i class="fas fa-user fa-md"></i>&nbsp; Nama Kelompok</td>
                  <td><i class="fas fa-school fa-md"></i>&nbsp; Program Studi</td>
                  <td><i class="fas fa-clock fa-md"></i>&nbsp; Mahasiswa</td>
                  <td><i class="fas fa-info-circle fa-md"></i>&nbsp; Status</td>
                </tr>
              </thead>
              <tbody>
              <?php 
              $no = 1;
              for ($i=0; $i < count($mhs2);$i++) { ?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{$mhs2[$i][1]}}</td>
                  <td>{{$mhs2[$i][2]}}</td>
                  <td>
                    <a class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#Detail-History-{{$mhs2[$i][0]}}" title="Detail Mahasiswa" type="button"> 
                      <i class="fa fa-exclamation fa-sm text-inverse"></i> Detail Mahasiswa 
                    </a>
                  </td>
                  <td>
                    <a type="button" href="{{ route('form-004-pdf', $mhs2[$i][0]) }}" class="btn btn-success btn-sm">Download</a>
                    <!-- <a type="button" href="#" class="btn btn-primary btn-sm">Edit</a> -->
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

@if(is_null($mhs) == 0) 

  @for ($j=0; $j < count($mhs);$j++) 
    @include('modal.detail-mhs-supervisi') 
  @endfor

@endif

@if(is_null($mhs2) == 0)

  @for ($j=0; $j < count($mhs2);$j++) 
    @include('modal.detail-mhs-history') 
  @endfor

@endif   

@endsection