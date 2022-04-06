<!DOCTYPE html>
<html lang="en">

{{-- NEW --}}

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css_pdf/bootstrap.min.css')}}">


  <title>Form 025 Penilaian Laporan Akhir PDF</title>
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
          <p style="margin-bottom: -50%; text-align: right; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;">FRM/SV/PKL/025</p>
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

          <p style="margin-bottom: -7px;"><b>PENILAIAN LAPORAN AKHIR</b></p>
          <p style="margin-bottom: -7px;"><b>PROGRAM STUDI {{strtoupper($mhs->getProdi->nama)}}</b></p>
          <p style="margin-bottom: -7px;"><b>TAHUN AKADEMIK 2021/2022</b></p>

          <hr style="height:1px; margin-bottom: -15px; border-width:0; background-color:black">
          <hr style="height:3px; border-width:0; background-color:black; margin-bottom: -6em;">
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: -1em; height: 9%;">
    <tbody>
      <tr>
        <td width="23%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Nama Mahasiswa</p></td>
        <td width="1%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td width="76%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ $mhs->nama }}</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">NIM</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ $mhs->nim }}</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Judul Laporan</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em; text-align: justify;">{{ $data->judul }}</p></td>
      </tr>
    </tbody>
  </table>


  <table class="table table-borderless" style="margin-top: -1em;">
    <tbody>
      <tr>
        <td style="font-size: 11pt;">a. Penilaian Laporan Akhir: </td>
      </tr>
      <tr>
        <td width="78%">
          <table class="table table-bordered" id="nilai" style="margin-top: -1em;">
            <thead>
              <tr>
                <th style="font-size: 11pt; font-weight: 600; text-align: center; vertical-align: middle;" width="7%">No.</th>
                <th style="font-size: 11pt; font-weight: 600; text-align: center; vertical-align: middle;" width="43%">Aspek</th>
                <th style="font-size: 11pt; font-weight: 600; text-align: center; vertical-align: middle;" width="15%">Bobot</th>
                <th style="font-size: 11pt; font-weight: 600; text-align: center; vertical-align: middle;" width="15%">Nilai</th>
                <th style="font-size: 11pt; font-weight: 600; text-align: center; vertical-align: middle;" width="20%">Bobot x Nilai</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="font-size: 11pt; text-align: center;">1. </td>
                <td style="font-size: 11pt; text-align: left;">Format Laporan</td>
                <td style="font-size: 11pt; text-align: center;">10%</td>
                <td style="font-size: 11pt; text-align: center;">{{$form->nilai1}}</td>
                <td style="font-size: 11pt; text-align: center;"><?= $form->nilai1 * 0.2; ?></td>
              </tr>
              <tr>
                <td style="font-size: 11pt; text-align: center;">2. </td>
                <td style="font-size: 11pt; text-align: left;">Substansi Laporan</td>
                <td style="font-size: 11pt; text-align: center;">80%</td>
                <td style="font-size: 11pt; text-align: center;">{{$form->nilai2}}</td>
                <td style="font-size: 11pt; text-align: center;"><?= $form->nilai2 * 0.4; ?></td>
              </tr>
              <tr>
                <td style="font-size: 11pt; text-align: center;">3. </td>
                <td style="font-size: 11pt; text-align: left;">Lain-lain (kerajinan, sopan santun, dan lain-lain)</td>
                <td style="font-size: 11pt; text-align: center;">10%</td>
                <td style="font-size: 11pt; text-align: center;">{{$form->nilai3}}</td>
                <td style="font-size: 11pt; text-align: center;"><?= $form->nilai3 * 0.4; ?></td>
              </tr>
              <tr>
                <td style="font-size: 11pt; text-align: center;" colspan="2">Total</td>
                <td style="font-size: 11pt; text-align: center;">100%</td>
                <td style="font-size: 11pt; text-align: center;"><?= $form->nilai1 + $form->nilai2 + $form->nilai3  ?></td>
                <td style="font-size: 11pt; text-align: center;"><?= ($form->nilai1 * 0.2) + ($form->nilai2 * 0.4) + ($form->nilai3 * 0.4); ?></td>
              </tr>
            </tbody>
          </table>
        </td>
        <td width="22%"></td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: -1em;">
    <tbody>
      <tr>
        <td><p>b. Nilai Jurnal Harian : {{$form->nilai_jurnal}}</p></td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: 1.5em;">
    <tbody>
      <tr>
        <td width="100%">
          <p style="margin-bottom: 0em; margin-left: 22.5em; margin-right: 0px; font-size: 11pt;">Bogor, {{ Carbon\Carbon::parse($bap->tgl)->translatedFormat('d F Y'); }}</p>
          <p style="margin-bottom: 0em; margin-left: 22.5em; margin-right: 0px; font-size: 11pt;">Dosen Pembimbing</p>
          <img src="{{url($dosen->ttd)}}" style="margin-left: 21em; margin-top: 7px; width: auto; height: 1.5cm;">
          <p style="margin-bottom: 0em; margin-left: 22.5em; margin-right: 0px; font-size: 11pt;">{{$dosen->nama}}</p>
          <p style="margin-bottom: 0em; margin-left: 22.5em; margin-right: 0px; font-size: 11pt;">NIP {{$dosen->nip}}</p>
          <br><br><br>
        </td>
        <td></td>
        <td></td>
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