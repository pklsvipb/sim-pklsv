<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css_pdf/bootstrap.min.css')}}">


  <title>Form 012 PDF</title>
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
  @foreach ($datas as $data)
  <table class="table table-borderless">
    <tbody>
      <tr>
        <td colspan="3">
          <p style="margin-bottom: -50%; text-align: right; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;">FRM/SV/PKL/012</p>
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
          <!--<p style="text-align: right; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;">FRM/SV/PKL/012</p>-->
        </td>
      </tr>
      <tr>
        <td colspan="3" style="text-align: center;">
          <hr style="height:1px; margin-bottom:-15px; margin-top: 8px; border-width:0; background-color:black">
          <hr style="height:3px; border-width:0; background-color:black; margin-bottom: 2px;">

          <p style="margin-bottom: -7px;"><b>PERSETUJUAN SUBSTANSI KAJIAN PKL</b></p>
          <p style="margin-bottom: -7px;"><b>PROGRAM STUDI {{strtoupper($data->getProdi->nama)}}</b></p>
          <p style="margin-bottom: -7px;"><b>TAHUN AKADEMIK 2021/2022</b></p>

          <hr style="height:1px; margin-bottom: -15px; border-width:0; background-color:black">
          <hr style="height:3px; border-width:0; background-color:black; margin-bottom: -6em;">
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: 1em; height: 11%;">
    <tbody>
      <tr>
        <td width="28%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Nama Perusahaan/Instansi</p></td>
        <td width="1%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td width="71%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ $instansi }}</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Alamat</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ $alamat }}</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Pembimbing Lapangan</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ $pemlap }}</p></td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: -1em;">
    <tbody>
      <tr>
        <td width="22%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Dengan ini Pembimbing Lapangan PKL menyatakan bahwa telah menyetujui substansi kajian PKL dari mahasiswa :</p></td>
      </tr>
  </table>

  <table class="table table-borderless" style="margin-top: 1em; height: 13%;">
    <tbody>
      <tr>
        <td width="6%" style="padding-top: 1px; padding-bottom: 1px;"></td>
        <td width="28%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Nama</p></td>
        <td width="1%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td width="65%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ $data->nama }}</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">NIM</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ $data->nim }}</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Program Studi</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ $data->getProdi->nama }}</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Judul Laporan Akhir</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ $judul }}</p></td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: 3em; margin-left: 23em; height: 21%;">
    <tbody>
      <tr>
        <td width="100%">
          <p style="margin-bottom: 0em; font-size: 11pt;">Bogor, {{ Carbon\Carbon::parse($tgl)->translatedFormat('d F Y'); }}</p>
          <p style="margin-bottom: 0em; font-size: 11pt;">Pembimbing Lapangan</p>
          @if (empty($ttd_pemlap))
          <p style="height: 1.3cm;"><br></p>
          @else
           <img src="{{$ttd->pemlap}}" style="margin-top: 7px; width: auto; height: 1.5cm;">
          @endif
          <p style="margin-bottom: 0em; font-size: 11pt;">({{$pemlap}})</p>
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: -22.5%; margin-right: 23em; height: 21%;">
    <tbody>
      <tr>
        <td width="50%">
          <p style="margin-bottom: 0em; font-size: 11pt;"><br></p>
          <p style="margin-bottom: 0em; font-size: 11pt;">Dosen Pembimbing</p>
          <img src="{{url($data->getDospem1->ttd)}}" style="margin-top: 7px; width: auto; height: 1.5cm;">
          <p style="margin-bottom: 0em; font-size: 11pt;">({{$data->getDospem1->nama}})</p>
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: 7em;">
    <tbody>
      <tr>
        <td style="padding-bottom: 0px;">
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

  @endforeach

  <script src="{{asset('css_pdf/jquery-3.2.1.slim.min.js')}}"></script>
  <script src="{{asset('css_pdf/popper.min.js')}}"></script>
  <script src="{{asset('css_pdf/bootstrap.min.js')}}"></script>
</body>

</html>