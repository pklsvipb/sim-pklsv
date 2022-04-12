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

    {{-- KOLOKIUM --}}
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL BELUM DAFTAR KOLOKIUM</span>
            <span class="info-box-number">{{106 - $kl_daftar_inf}}</span>
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
            <span class="info-box-number">{{$kl_daftar_inf}}</span>
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
            <span class="info-box-number">{{$kl_belum_inf}}</span>
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
            <span class="info-box-number">{{$kl_sudah_inf}}</span>
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

    {{-- SEMINAR --}}
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL BELUM DAFTAR SEMINAR</span>
            <span class="info-box-number">{{106 - $sm_daftar_inf}}</span>
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
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL SUDAH DAFTAR SEMINAR</span>
            <span class="info-box-number">{{$sm_daftar_inf}}</span>
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
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL BELUM SEMINAR</span>
            <span class="info-box-number">{{$sm_belum_inf}}</span>
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
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL SUDAH SEMINAR</span>
            <span class="info-box-number">{{$sm_sudah_inf}}</span>
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

    {{-- SIDANG --}}
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL BELUM DAFTAR SIDANG</span>
            <span class="info-box-number">{{106 - $sd_daftar_inf}}</span>
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
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL SUDAH DAFTAR SIDANG</span>
            <span class="info-box-number">{{$sd_daftar_inf}}</span>
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
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL BELUM SIDANG</span>
            <span class="info-box-number">{{$sd_belum_inf}}</span>
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
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL SUDAH SIDANG</span>
            <span class="info-box-number">{{$sd_sudah_inf}}</span>
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

    {{-- KOLOKIUM --}}
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL BELUM DAFTAR KOLOKIUM</span>
            <span class="info-box-number">{{128 - $kl_daftar_tek}}</span>
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
            <span class="info-box-number">{{$kl_daftar_tek}}</span>
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
            <span class="info-box-number">{{$kl_belum_tek}}</span>
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
            <span class="info-box-number">{{$kl_sudah_tek}}</span>
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

    {{-- SEMINAR --}}
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL BELUM DAFTAR SEMINAR</span>
            <span class="info-box-number">{{106 - $sm_daftar_tek}}</span>
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
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL SUDAH DAFTAR SEMINAR</span>
            <span class="info-box-number">{{$sm_daftar_tek}}</span>
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
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL BELUM SEMINAR</span>
            <span class="info-box-number">{{$sm_belum_tek}}</span>
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
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL SUDAH SEMINAR</span>
            <span class="info-box-number">{{$sm_sudah_tek}}</span>
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

    {{-- SIDANG --}}
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <div class="info-box">
          <div class="info-box-content">
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL BELUM DAFTAR SIDANG</span>
            <span class="info-box-number">{{106 - $sd_daftar_tek}}</span>
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
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL SUDAH DAFTAR SIDANG</span>
            <span class="info-box-number">{{$sd_daftar_tek}}</span>
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
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL BELUM SIDANG</span>
            <span class="info-box-number">{{$sd_belum_tek}}</span>
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
            <span class="info-box-text" style="font-size: 10px; font-weight: 600;">TOTAL SUDAH SIDANG</span>
            <span class="info-box-number">{{$sd_sudah_tek}}</span>
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