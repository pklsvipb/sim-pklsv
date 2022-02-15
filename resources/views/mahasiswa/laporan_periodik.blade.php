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

                  <div class="col-md-3" id="menu-kedua">
                    <a href="{{ route('jurnal') }}" style="text-decoration: none; padding: 17px 50px;">JURNAL HARIAN</a>
                  </div>
                  <div class="col-md-3" id="menu-pertama">
                    <a href="{{ route('periodik') }}" style="text-decoration: none; padding: 17px 50px;">LAPORAN PERIODIK</a>
                  </div>
                  <div class="col-md-3" id="menu-kedua">
                    <a href="{{ route('k-bimbingan') }}" style="text-decoration: none; padding: 17px 50px;">KARTU BIMBINGAN TA</a>
                  </div>
                  <div class="col-md-3" id="menu-kedua">
                    <a href="{{ route('k-seminar') }}" style="text-decoration: none; padding: 17px 50px;">KARTU SEMINAR</a>
                  </div>

                </div>
                <hr style="margin-top: -9px;">

                <div style="font-size: 16px; font-weight: 600; margin: 20px 0px 40px 0px; text-align:center;">
                  FORM 010 <br>
                  LAPORAN PERIODIK PKL
                </div>
                <form action="{{ route('periodik-submit') }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 20px 0px;">
                    <tbody>
                      <tr>
                        <td width="25%">Periode Laporan</td>
                        <td>:</td>
                        <td width="75%">
                          <select name="periode" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required>
                            <option value="03 Januari 2022 - 07 Januari 2022">03 Januari 2022 - 07 Januari 2022</option>
                            <option value="10 Januari 2022 - 14 Januari 2022">10 Januari 2022 - 14 Januari 2022</option>
                            <option value="17 Januari 2022 - 21 Januari 2022">17 Januari 2022 - 21 Januari 2022</option>
                            <option value="24 Januari 2022 - 28 Januari 2022">24 Januari 2022 - 28 Januari 2022</option>
                            <option value="31 Januari 2022 - 04 Fenruari 2022">31 Januari 2022 - 04 Fenruari 2022</option>
                            <option value="07 Februari 2022 - 11 Februari 2022">07 Februari 2022 - 11 Februari 2022</option>
                            <option value="14 Februari 2022 - 18 Februari 2022">14 Februari 2022 - 18 Februari 2022</option>
                            <option value="07 Februari 2022 - 11 Februari 2022">07 Februari 2022 - 11 Februari 2022</option>
                            <option value="21 Februari 2022 - 25 Februari 2022">21 Februari 2022 - 25 Februari 2022</option>
                            <option value="28 Februari 2022 - 04 Maret 2022">28 Februari 2022 - 04 Maret 2022</option>
                          </select>
                        </td>
                      </tr>
                    </tbody>
                  </table>

                  <table cellspacing="0" cellpadding="3" border="1" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                    <thead>
                      <tr>
                        <th width="10%" style="text-align: center">Tanggal</th>
                        <th width="45%" style="text-align: center">Informasi yang diperoleh</th>
                        <th width="45%" style="text-align: center">Masalah/Kendala</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="date" name="tanggal" class="form-control"></td>
                        <td><textarea name="info" rows="3" cols="47" class="form-control"></textarea></td>
                        <td><textarea name="kendala" rows="3" cols="47" class="form-control"></textarea></td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="row">
                    <div class="col-md-12" style="font-size: .875rem; font-weight: 600; margin-bottom: 50px;">
                      <label>Catatan Khusus Selama Periode (Opsional)</label>
                      <textarea name="catatan" rows="3" class="form-control"></textarea>
                    </div>
                  </div>

                  <br>
                  <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: ;"><i class="fas fa-save fa-sm"></i>&nbsp; Simpan</button>
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
                <table cellspacing="0" cellpadding="3" border="1" style="font-size: .875rem; font-weight: 600; margin: 50px 0px; text-align: center;">
                  <thead>
                    <tr>
                      <th width="10%">Periode</th>
                      <th width="10%">Tanggal</th>
                      <th width="30%">Informasi yang diperoleh</th>
                      <th width="30%">Masalah/Kendala</th>
                      <th width="10%">Catatan Khusus</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($periodiks as $periodik)
                    <tr>
                      <td style="font-size: 12px;">{{ $periodik->periode }}</td>
                      <td style="font-size: 12px;">{{ $periodik->tanggal }}</td>
                      <td><textarea name="info" rows="3" cols="47" class="form-control">{{ $periodik->informasi }}</textarea></td>
                      <td><textarea name="kendala" rows="3" cols="47" class="form-control">{{ $periodik->kendala }}</textarea></td>
                      <td>{{ $periodik->catatan }}</td>
                    </tr>
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