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
                  <div class="col-md-4" id="menu-pertama">
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

              <div style="font-size: 16px; font-weight: 600; margin: 20px 0px 40px 0px; text-align:center;">
                FORM 010 <br>
                LAPORAN PERIODIK PKL
              </div>
              <form action="{{ route('periodik-submit') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <table cellspacing="0" cellpadding="3" border="1" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                  <thead>
                    <tr>
                      <th colspan="2" width="10%" style="text-align: center;">Periode <br><span style="font-size: 11px;">(jangka waktu perminggu / perdua minggu)</span></th>
                      <th rowspan="2" width="10%" style="text-align: center">Tanggal</th>
                      <th rowspan="2" width="40%" style="text-align: center">Informasi yang diperoleh</th>
                      <th rowspan="2" width="40%" style="text-align: center">Masalah/Kendala</th>
                    </tr>
                    <tr>
                      <th style="text-align: center">Tgl Awal</th>
                      <th style="text-align: center">Tgl Selesai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="date" name="awal" class="form-control"></td>
                      <td><input type="date" name="selesai" class="form-control"></td>
                      <td><input type="date" name="tanggal" class="form-control"></td>
                      <td><textarea name="info" rows="3" cols="47" class="form-control"></textarea></td>
                      <td><textarea name="kendala" rows="3" cols="47" class="form-control"></textarea></td>
                    </tr>
                  </tbody>
                </table>

                <div class="row">
                  <div class="col-md-12" style="font-size: .875rem; font-weight: 600; margin-bottom: 50px;">
                    <label>Catatan Khusus Selama Periode (<span style="color: red;">Opsional</span>)</label>
                    <textarea name="catatan" rows="3" class="form-control"></textarea>
                  </div>
                </div>

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
            @if(count($periode) == 0)
              <table class="table table-bordered" cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px; text-align: center;">
                <thead>
                  <tr>
                    <th width="10%">Tanggal</th>
                    <th width="30%">Informasi yang diperoleh</th>
                    <th width="30%">Masalah/Kendala</th>
                    <th width="25%">Catatan Khusus</th>
                    <th width="5%" style="text-align: center;">Edit</th>
                  </tr>
                </thead>
              </table>
            @else
              <?php for ($i = 0; $i < count($periode); $i++) { ?>
                <table class="table table-bordered" cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px; text-align: center;">
                  <thead>
                    <tr>
                      <th colspan="5" style="font-weight: 900; padding: 5px; background: #02F0F6;">Periode</th>
                    </tr>
                    <tr>
                      <td colspan="5" style="font-size: 12px; text-align:center;">{{ Carbon\Carbon::parse($periode[$i][1])->translatedFormat('l, d F Y'); }} / {{ Carbon\Carbon::parse($periode[$i][2])->translatedFormat('l, d F Y'); }} <a data-toggle="modal" data-target="#Edit-Periode-{{$periode[$i][0]}}" title="edit kegiatan" style="font-size: .875rem; cursor: pointer; color: #005b8f; float: right;"><i class="fas fa-edit fa-lg"></i></a></td>
                    </tr>
                    <tr>
                      <th width="10%" style="font-weight: 900;">Tanggal</th>
                      <th width="30%" style="font-weight: 900;">Informasi yang diperoleh</th>
                      <th width="30%" style="font-weight: 900;">Masalah/Kendala</th>
                      <th width="25%" style="font-weight: 900;">Catatan Khusus</th>
                      <th width="5%" style="text-align: center;">Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($j = 0; $j < count($periodik); $j++) { ?>
                      @if($periode[$i][1] == $periodik[$j][8] && $periode[$i][2] == $periodik[$j][9])
                      <tr>
                        <td style="font-size: 12px; text-align:center;">{{ Carbon\Carbon::parse($periodik[$j][4])->translatedFormat('l, d F Y'); }}</td>
                        <td style="font-size: 12px; text-align:left;">{{ $periodik[$j][5] }}</td>
                        <td style="font-size: 12px; text-align:left;">{{ $periodik[$j][6] }}</td>
                        <td style="font-size: 12px; text-align:left;">{{ $periodik[$j][7] }}</td>
                        <td><a data-toggle="modal" data-target="#Edit-Periodik-{{$periodik[$j][0]}}" title="edit kegiatan" style="cursor: pointer; color: #005b8f;"><i class="fas fa-edit fa-lg"></i></a></td>
                      </tr>
                      @endif
                    <?php } ?>
                  </tbody>
                </table>
              <?php } ?>
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

  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->

@if(is_null($periode) == 0)
  @for($i=0; $i < count($periode); $i++) 
    @include('modal.edit-periode') 
    @for($j=0; $j < count($periodik); $j++)
      @if($periode[$i][1] == $periodik[$j][8])
        @include('modal.edit-periodik') 
      @endif
    @endfor
  @endfor 
@endif 

@endsection

@push('scripts')
<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
  });

  function selectRefresh() {
    $('.select2').select2({
      //-^^^^^^^^--- update here
      tags: true,
      width: '100%'
    });
  }
</script>
@endpush