@extends('layouts.panitia')

@section('user')
<div class="info">
  <a href="#" class="d-block">
    @foreach($datas as $data)
    <span> {{$data->nama}}</span>
    &nbsp;
    @endforeach

    <p style="font-size: 11px; ">Panitia</p>
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
      <div class="col-md-3 col-sm-3">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL MAHASISWA</span>
            <span class="info-box-number">{{ count($get_mh) }}</span>
            <div class="progress">
              <div class="progress-bar bg-dark" style="width:90%;"></div>
            </div>
          </div>
          <span class="info-box-icon bg-secondary"><i class="fas fa-file-import"></i></span>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <div class="col-md-3 col-sm-3">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL MAHASISWA KOLOKIUM</span>
            <span class="info-box-number">{{ count($get_kl) }}</span>
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
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL MAHASISWA SEMINAR</span>
            <span class="info-box-number">{{ count($get_sm) }}</span>
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

      <div class="col-md-3 col-sm-3">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL MAHASISWA SIDANG</span>
            <span class="info-box-number">{{ count($get_sd) }}</span>
            <div class="progress">
              <div class="progress-bar bg-dark" style="width:90%;"></div>
            </div>
          </div>
          <span class="info-box-icon bg-danger"><i class="fa fa-users"></i></span>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="{{ url('/panitia/pengumuman') }}" method="POST" class="form-horizontal">
              @csrf
              <div class="form_div text-center">
                <label style="position: absolute; top: 3%; background: white; margin-left: -6%; padding: 0px 10px;">Pengumuman</label>
                <textarea name="info" class="form-control" rows="15" placeholder="Insert Information Here">{{ $info->pengumuman }}</textarea>
              </div>
              <div class="row mt-2">
                <div class="col-md-6">
                  <button type="submit" class="btn btn-success btn-sm" style="width: 100%; margin-top: 1%;">Simpan</button>
                </div>
            </form>
            <div class="col-md-6">
              <style>
                input.placeholder {
                  text-align: center;
                  top: 3%;
                }
              </style>
              <form action="{{ url('/panitia/pengumuman/delete') }}" method="POST" class="form-horizontal">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm" style="width: 100%; margin-top: 1%;">Hapus</button>
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
  <!-- /.row -->

  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection