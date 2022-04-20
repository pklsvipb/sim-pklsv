<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css_pdf/bootstrap.min.css')}}">


  <title>Dosen Pembimbing Sidang PDF</title>
  <style>
    body {
      font-family: "Times New Roman", Times, serif;
    }

    .table-borderless>tbody>tr>td,
    .table-borderless>tbody>tr>th,
    .table-borderless>tfoot>tr>td,
    .table-borderless>tfoot>tr>th,
    .table-borderless>thead>tr>td,
    .table-borderless>thead>tr>th {
      border: none;
    }

    #nilai th,
    #nilai td {
      padding: 5px;
    }

    #footer th,
    #footer td {
      padding: 0.5px;
    }

    #nilai.table-bordered>thead>tr>th {
      border: 1px solid black;
    }

    #nilai.table-bordered>tbody>tr>td {
      border: 1px solid black;
    }

    #footer.table-bordered>thead>tr>th {
      border: 1px solid black;
    }

    #footer.table-bordered>tbody>tr>td {
      border: 1px solid black;
    }

    @page {
      margin-left: 2.5cm;
      margin-right: 1.5cm;
      margin-bottom: 0.2cm;
    }
  </style>
</head>

<body>
  <table class="table table-borderless">
    <tbody>
      <tr>
        <td colspan="3">
          <p style="margin-bottom: -50%; text-align: right; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;">FRM/SV/PKL/023</p>
        </td>   
      </tr>
      <tr>
        <td width="15%">
          <img src="{{url('images/logo-form2.jpg')}}" style="width: 2.06cm; height: 2.06cm; margin-top: 2px;">
        </td>
        <td width="80%" style="text-align:center;">
          <p style="margin-bottom: -6px; font-family: Arial, Helvetica, sans-serif; font-size: 11pt;"> KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI </p>
          <p style="margin-bottom: -6px; font-family: Arial, Helvetica, sans-serif; font-size: 11pt;"> INSTITUT PERTANIAN BOGOR </p>
          <p style="margin-bottom: -6px; font-family: Arial, Helvetica, sans-serif; font-size: 12pt;"> <b> SEKOLAH VOKASI </b> </p>
          <p style="margin-bottom: -6px; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;"> Kampus IPB Cilibende, Jl. Kumbang No.14 Bogor 16151 </p>
          <p style="margin-bottom: -10%; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;"> Telp. /Fax. (0251) 83480007/8376845 </p>
        </td>
        <td width="5%">
          <!--<p style="text-align: right; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;">FRM/SV/PKL/029</p>-->
        </td>
      </tr>
      <tr>
        <td colspan="3" style="text-align: center;">
          <hr style="height:1px; margin-bottom:-15px; margin-top: 8px; border-width:0; background-color:black">
          <hr style="height:3px; border-width:0; background-color:black; margin-bottom: 2px;">

          <p style="margin-bottom: -7px;"><b>BERITA ACARA DAN NILAI UJIAN TUGAS AKHIR</b></p>
          <p style="margin-bottom: -7px;"><b>PROGRAM STUDI {{strtoupper($mhs->getProdi->nama)}}</b></p>
          <p style="margin-bottom: -7px;"><b>TAHUN AKADEMIK 2021/2022</b></p>

          <hr style="height:1px; margin-bottom: -15px; border-width:0; background-color:black">
          <hr style="height:3px; border-width:0; background-color:black; margin-bottom: -6em;">
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: -1em; height: 16%;">
    <tbody>
      <tr>
        <td width="23%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Nama</p></td>
        <td width="1%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td width="76%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ $mhs->nama }}</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">NIM</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ $mhs->nim }}</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Judul Laporan Akhir</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em; text-align: justify;">{{ $data->judul }}</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Hari/Tanggal Ujian</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ Carbon\Carbon::parse($data->tgl)->translatedFormat('l/ d F Y'); }}</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Waktu Ujian</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ date('H:i', strtotime($data->waktu)) }}</p></td>
      </tr>
    </tbody>
  </table>


  <table class="table table-borderless" style="margin-top: -1em;">
    <tbody>
      <tr>
        <td style="font-size: 11pt;">Penilaian : </td>
      </tr>
      <tr>
        <td width="78%">
          <table class="table table-bordered" id="nilai" style="margin-top: -1em;">
            <thead>
              <tr>
                <th rowspan="2" style="font-size: 11pt; font-weight: 600; text-align: center; vertical-align: middle;" width="7%">No.</th>
                <th rowspan="2" style="font-size: 11pt; font-weight: 600; text-align: center; vertical-align: middle;" width="31%">Aspek</th>
                <th rowspan="2" style="font-size: 11pt; font-weight: 600; text-align: center; vertical-align: middle;" width="15%">Bobot</th>
                <th colspan="2" style="font-size: 11pt; font-weight: 600; text-align: center;" width="25%">Dosen Pembimbing</th>
              </tr>
              <tr>
                <th style="font-size: 11pt; text-align: center;">Nilai</th>
                <th style="font-size: 11pt; text-align: center;">Bobot x Nilai</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="font-size: 11pt; text-align: center;">1. </td>
                <td style="font-size: 11pt; text-align: left;">Penyajian Laporan</td>
                <td style="font-size: 11pt; text-align: center;">20%</td>
                <td style="font-size: 11pt; text-align: center;">{{$bap->nilai1}}</td>
                <td style="font-size: 11pt; text-align: center;"><?= $bap->nilai1 * 0.2; ?></td>
              </tr>
              <tr>
                <td style="font-size: 11pt; text-align: center;">2. </td>
                <td style="font-size: 11pt; text-align: left;">Format dan substansi Laporan</td>
                <td style="font-size: 11pt; text-align: center;">40%</td>
                <td style="font-size: 11pt; text-align: center;">{{$bap->nilai2}}</td>
                <td style="font-size: 11pt; text-align: center;"><?= $bap->nilai2 * 0.4; ?></td>
              </tr>
              <tr>
                <td style="font-size: 11pt; text-align: center;">3. </td>
                <td style="font-size: 11pt; text-align: left;">Argumentasi</td>
                <td style="font-size: 11pt; text-align: center;">40%</td>
                <td style="font-size: 11pt; text-align: center;">{{$bap->nilai3}}</td>
                <td style="font-size: 11pt; text-align: center;"><?= $bap->nilai3 * 0.4; ?></td>
              </tr>
              <tr>
                <td style="font-size: 11pt; text-align: center;" colspan="2">Total</td>
                <td style="font-size: 11pt; text-align: center;">100%</td>
                <td colspan="2" style="font-size: 11pt; text-align: center;"><?= ($bap->nilai1 * 0.2) + ($bap->nilai2 * 0.4) + ($bap->nilai3 * 0.4); ?></td>
              </tr>
            </tbody>
          </table>
        </td>
        <td width="22%"></td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: -2em;">
    <tbody>
      <tr>
        <td><p style="margin-bottom: -10em; font-size: 11pt;">Kelulusan</p></td>
        <td><p style="margin-bottom: -10em; font-size: 11pt;">:</p></td>
        <td colspan="2"><p style="margin-bottom: -10em; font-size: 11pt;">
          @if ((($bap->nilai1 +  $bap->nilai2 + $bap->nilai3) / 3) > 65)
            Lulus / <s>Tidak Lulus</s> *)
          @else
            <s>Lulus</s> / Tidak Lulus *)
          @endif
        </p></td>
      </tr>
      <tr>
        <td width="21%"><p style="margin-bottom: 0em; font-size: 11pt;">Standar Kelulusan</p></td>
        <td width="1%"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td width="23%"><p style="margin-bottom: 0em; font-size: 11pt;">Nilai > 65</p></td>
        <td width="55%">
          <p style="margin-bottom: 0em; margin-left: 3.5em; margin-right: 0px; font-size: 11pt;">Bogor, {{ Carbon\Carbon::parse($bap->tgl)->translatedFormat('d F Y'); }}</p>
          <p style="margin-bottom: 0em; margin-left: 3.5em; margin-right: 0px; font-size: 11pt;">Dosen Pembimbing</p>
          <img src="{{url($dosen->ttd)}}" style="margin-left: 3em; margin-top: 7px; width: auto; height: 1.5cm;">
          <p style="margin-bottom: 0em; margin-left: 3.5em; margin-right: 0px; font-size: 11pt;">{{$dosen->nama}}</p>
          <p style="margin-bottom: 0em; margin-left: 3.5em; margin-right: 0px; font-size: 11pt;">NIP {{$dosen->nip}}</p>
          <br><br><br>
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless">
    <tbody>
      <tr>
        <td style="padding-bottom: 0px; padding-top: 0px;">
          <table class="table table-bordered" id="footer">
            <tbody>
              <tr>
                <td style="font-size: 10pt; text-align: center; font-family: Arial, Helvetica, sans-serif;" width="40%">No. Revisi : 00</td>
                <td style="font-size: 10pt; text-align: center; font-family: Arial, Helvetica, sans-serif;" width="10%">Hal: 1/1</td>
                <td style="font-size: 10pt; text-align: center; font-family: Arial, Helvetica, sans-serif;" width="50%">Tanggal Berlaku: 09 Oktober 2020</td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>

  <script src="{{asset('css_pdf/jquery-3.2.1.slim.min.js')}}"></script>
  <script src="{{asset('css_pdf/popper.min.js')}}"></script>
  <script src="{{asset('css_pdf/bootstrap.min.js')}}"></script>
</body>

</html>