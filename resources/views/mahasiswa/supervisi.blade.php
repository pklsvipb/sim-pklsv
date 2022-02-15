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
          <div class="card-header">
            <!-- <h5 class="card-title">Profile</h5> -->
            <h1 class="card-title" style="font-weight: 600; font-size: 1.2rem;">Dashboard <small style="font-size: 12px; color: #777;">Mahasiswa</small></h1>
          </div>
          <!-- /.card-header -->
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
                      <td>{{$data->prodi}}</td>
                    </tr>
                    @endforeach

                    <tr>
                      <td width="400px">Bar Progress</td>
                      <td>
                        <div class="progress" style="background-color: white">
                          <div class="circle done">
                            <p class="label">1</p>
                            <p class="title">Kolokium</p>
                          </div>
                          <span class="bar done"></span>
                          <div class="circle done">
                            <p class="label">2</p>
                            <p class="title">Supervisi</p>
                          </div>
                          <span class="bar half"></span>
                          <div class="circle active">
                            <p class="label">3</p>
                            <p class="title">Seminar</p>
                          </div>
                          <span class="bar"></span>
                          <div class="circle">
                            <p class="label">4</p>
                            <p class="title">Sidang</p>
                          </div>
                        </div>
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

@push('scripts')
<script>
  $(document).ready(function() {
    var i = 1;
    $('.progress .circle').removeClass().addClass('circle');
    $('.progress .bar').removeClass().addClass('bar');
    setInterval(function() {
      $('.progress .circle:nth-of-type(' + i + ')').addClass('active');

      $('.progress .circle:nth-of-type(' + (i - 1) + ')').removeClass('active').addClass('done');

      $('.progress .circle:nth-of-type(' + (i - 1) + ') .label').html('&#10003;');

      $('.progress .bar:nth-of-type(' + (i - 1) + ')').addClass('active');

      $('.progress .bar:nth-of-type(' + (i - 2) + ')').removeClass('active').addClass('done');

      i++;

      if (i == 0) {
        $('.progress .bar').removeClass().addClass('bar');
        $('.progress div.circle').removeClass().addClass('circle');
        i = 1;
      }
    }, 1000);
  });
</script>
@endpush