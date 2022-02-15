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
    
    <style>
    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    background-color: white;
    }
    </style>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
              <div class="form_div text-center">
                <label style="position: absolute; top: 3%; background: white; margin-left: -5%; padding: 0px 10px;">Pengumuman</label>
                <textarea name="info" class="form-control" rows="5" readonly>{{ $info->pengumuman }}</textarea>
              </div>
          </div>
          <!-- ./card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 mb-4 text-center">
                <div class="title bg">Bar Progress</div>
              </div>
              <div class="progress" style="background-color: white; margin: auto;">
                @if($bap_kl != null)
                <div class="circle done">
                  <p class="label"><i class="fas fa-check"></i></p>
                  <p class="title">Kolokium</p>
                </div>
                @else
                <div class="circle">
                  <p class="label">1</p>
                  <p class="title">Kolokium</p>
                </div>
                @endif

                @if($bap_sm != null)
                <span class="bar"></span>
                <div class="circle done">
                  <p class="label"><i class="fas fa-check"></i></p>
                  <p class="title">Seminar</p>
                </div>
                @else
                <span class="bar"></span>
                <div class="circle">
                  <p class="label">2</p>
                  <p class="title">Seminar</p>
                </div>
                @endif

                @if($bap_sd != null)
                <span class="bar"></span>
                <div class="circle done">
                  <p class="label"><i class="fas fa-check"></i></p>
                  <p class="title">Sidang</p>
                </div>
                @else
                <span class="bar"></span>
                <div class="circle">
                  <p class="label">3</p>
                  <p class="title">Sidang</p>
                </div>
                @endif
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

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                  <tbody>
                    @foreach($datas as $data)
                    <tr>
                      <td width="400px" style="border-top: none;">Nama</td>
                      <td style="border-top: none;">{{$data->nama}}</td>
                    </tr>
                    <tr>
                      <td width="400px">NIM</td>
                      <td>{{$data->nim}}</td>
                    </tr>
                    <tr>
                      <td width="400px">Program Studi</td>
                      <td>{{$data->getProdi->nama}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                  <tbody style="text-align: center;">
                    <tr>
                      <td colspan="4" style="border-top: none;">PENGISIAN NILAI BERITA ACARA PEMERIKSAAN (BAP)</td>
                    </tr>

                    <tr>
                      <td><i class="fas fa-clock" aria-hidden="true"></i></td>
                      <td><i class="fa fa-user" aria-hidden="true"></i> Dosen Pembimbing</td>
                      <td><i class="fa fa-user" aria-hidden="true"></i> Moderator</td>
                      <td><i class="fa fa-user" aria-hidden="true"></i> Dosen Penguji</td>
                    </tr>

                    <tr>
                      <td>Kolokium</td>
                      <td>
                        @if (count($bap_kl) == 0)
                        <span style="font-size: 20px;"> - </span>
                        @else
                          @if ($bap_kl[0] == 0)
                              <span style="font-size: 20px;"> - </span>
                          @else
                          <i class="fas fa-check text-success"></i>
                          @endif
                        @endif
                      </td>
                      <td>
                        @if (count($bap_kl) == 0)
                        <span style="font-size: 20px;"> - </span>
                        @else
                          @if ($bap_kl[1] == 0)
                              <span style="font-size: 20px;"> - </span>
                          @else
                          <i class="fas fa-check text-success"></i>
                          @endif
                        @endif
                      </td>
                      <td><span> Tidak ada </span></td>
                    </tr>

                    <tr>
                      <td>Seminar</td>
                      <td>
                        @if (count($bap_sm) == 0)
                        <span style="font-size: 20px;"> - </span>
                        @else
                          @if ($bap_sm[0] == 0)
                              <span style="font-size: 20px;"> - </span>
                          @else
                          <i class="fas fa-check text-success"></i>
                          @endif
                        @endif
                      </td>
                      <td>
                        @if (count($bap_sm) == 0)
                        <span style="font-size: 20px;"> - </span>
                        @else
                          @if ($bap_sm[1] == 0)
                              <span style="font-size: 20px;"> - </span>
                          @else
                          <i class="fas fa-check text-success"></i>
                          @endif
                        @endif
                      </td>

                      <td><span> Tidak ada </span></td>
                    </tr>

                    <tr>
                      <td>Sidang</td>
                      <td>
                        @if (count($bap_sm) == 0)
                        <span style="font-size: 20px;"> - </span>
                        @else
                          @if ($bap_sm[0] == 0)
                              <span style="font-size: 20px;"> - </span>
                          @else
                          <i class="fas fa-check text-success"></i>
                          @endif
                        @endif
                      </td>

                      <td><span> Tidak ada </span></td>
                      
                      <td>
                        @if (count($bap_sm) == 0)
                        <span style="font-size: 20px;"> - </span>
                        @else
                          @if ($bap_sm[1] == 0)
                              <span style="font-size: 20px;"> - </span>
                          @else
                          <i class="fas fa-check text-success"></i>
                          @endif
                        @endif
                      </td>
                    </tr>

                  </tbody>
                </table>
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
