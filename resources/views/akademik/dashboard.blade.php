@extends('layouts.akademik')

@section('user')
<div class="info">
  <a href="#" class="d-block">
    @foreach($datas as $data)
    <span> {{$data->nama}}</span>
    &nbsp;
    @endforeach

    <p style="font-size: 11px; ">Akademik</p>
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

    <h5>Manajemen Informatika</h5>
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL BELUM DAFTAR KOLOKIUM</span>
            <span class="info-box-number">{{106 - $daftar_inf}}</span>
            <div class="progress">
              <div class="progress-bar bg-dark" style="width:90%;"></div>
            </div>
          </div>
          <span class="info-box-icon bg-danger"><i class="fas fa-users"></i></span>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <div class="col-md-3 col-sm-3">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL SUDAH DAFTAR KOLOKIUM</span>
            <span class="info-box-number">{{$daftar_inf}}</span>
            <div class="progress">
              <div class="progress-bar bg-dark" style="width:90%;"></div>
            </div>
          </div>
          <span class="info-box-icon bg-secondary"><i class="fas fa-users"></i></span>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <div class="col-md-3 col-sm-3">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL BELUM KOLOKIUM</span>
            <span class="info-box-number">{{$belum_inf}}</span>
            <div class="progress">
              <div class="progress-bar bg-dark" style="width:90%;"></div>
            </div>
          </div>
          <span class="info-box-icon bg-info"><i class="fa fa-users"></i></span>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <div class="col-md-3 col-sm-3">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL SUDAH KOLOKIUM</span>
            <span class="info-box-number">{{$sudah_inf}}</span>
            <div class="progress">
              <div class="progress-bar bg-dark" style="width:90%;"></div>
            </div>
          </div>
          <span class="info-box-icon bg-success"><i class="fa fa-users"></i></span>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>

    <hr>
    <h5>Teknik Komputer</h5>
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL BELUM DAFTAR KOLOKIUM</span>
            <span class="info-box-number">{{128 - $daftar_tek}}</span>
            <div class="progress">
              <div class="progress-bar bg-dark" style="width:90%;"></div>
            </div>
          </div>
          <span class="info-box-icon bg-danger"><i class="fas fa-users"></i></span>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <div class="col-md-3 col-sm-3">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL SUDAH DAFTAR KOLOKIUM</span>
            <span class="info-box-number">{{$daftar_tek}}</span>
            <div class="progress">
              <div class="progress-bar bg-dark" style="width:90%;"></div>
            </div>
          </div>
          <span class="info-box-icon bg-secondary"><i class="fas fa-users"></i></span>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <div class="col-md-3 col-sm-3">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL BELUM KOLOKIUM</span>
            <span class="info-box-number">{{$belum_tek}}</span>
            <div class="progress">
              <div class="progress-bar bg-dark" style="width:90%;"></div>
            </div>
          </div>
          <span class="info-box-icon bg-info"><i class="fa fa-users"></i></span>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <div class="col-md-3 col-sm-3">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL SUDAH KOLOKIUM</span>
            <span class="info-box-number">{{$sudah_tek}}</span>
            <div class="progress">
              <div class="progress-bar bg-dark" style="width:90%;"></div>
            </div>
          </div>
          <span class="info-box-icon bg-success"><i class="fa fa-users"></i></span>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>

  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection