<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css_pdf/bootstrap.min.css')}}">


  <title>Form 003 PDF</title>
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
        <td width="20%">
          <p>&nbsp;</p>
          <img src="{{url('images/logo-form2.jpg')}}" style="width: 2.06cm; height: 2.06cm; margin-top: 2px;">
        </td>
        <td width="60%" style="text-align:center;">
          <p>&nbsp;</p>
          <p style="margin-bottom: -6px; font-family: Arial, Helvetica, sans-serif; font-size: 11pt; margin-top: -7;"> KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN </p>
          <p style="margin-bottom: -6px; font-family: Arial, Helvetica, sans-serif; font-size: 11pt;"> INSTITUT PERTANIAN BOGOR </p>
          <p style="margin-bottom: -6px; font-family: Arial, Helvetica, sans-serif; font-size: 12pt;"> <b> SEKOLAH VOKASI </b> </p>
          <p style="margin-bottom: -6px; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;"> Kampus IPB Cilibende, Jl. Kumbang No.14 Bogor 16151 </p>
          <p style="margin-bottom: -3em; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;"> Telp. /Fax. (0251) 83480007/8376845 </p>
        </td>
        <td width="20%">
          <p style="text-align: right; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;">FRM/SV/PKL/003</p>
        </td>
      </tr>
      <tr>
        <td colspan="3" style="text-align: center;">
          <hr style="height:1px; margin-bottom:-15px; margin-top: 8px; border-width:0; background-color:black">
          <hr style="height:3px; border-width:0; background-color:black; margin-bottom: 2px;">

          <p style="margin-bottom: -7px;"><b>FORMULIR KESEDIAAN DOSEN PEMBIMBING</b></p>
          <p style="margin-bottom: -7px;"><b>PRAKTIK KERJA LAPANGAN MAHASISWA</b></p>
          <p style="margin-bottom: -7px;"><b>PROGRAM STUDI {{strtoupper($prodi)}}</b></p>
          <p style="margin-bottom: -7px;"><b>TAHUN AKADEMIK 2021/2022</b></p>

          <hr style="height:1px; margin-bottom: -15px; border-width:0; background-color:black">
          <hr style="height:3px; border-width:0; background-color:black; margin-bottom: -6em;">
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: 1.5em; height: 6%;">
    <tbody>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px; text-align: justify;"><p style="margin-bottom: 0em; font-size: 11pt;">Bersama ini saya menyatakan <b>bersedia/<strike>tidak bersedia</strike></b> menjadi Dosen Pembimbing Praktik Kerja Lapangan mahasiswa di Program Studi {{$prodi}}, Sekolah Vokasi IPB Tahun Akademik 2021/2022 untuk bidang peminatan :</p></td>
        </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: 1em; height: 6%;">
    <tbody>
      <tr>
        <td width="6%"></td>
        <td style="padding-top: 1px; padding-bottom: 1px; text-align: justify;"><p style="margin-bottom: 0em; font-size: 11pt;">1. {{ $peminatan1 }}</p></td>
      </tr>
      @if ($peminatan2 == "")
      <tr>
        <td width="6%"></td>
        <td style="padding-top: 1px; padding-bottom: 1px; text-align: justify;"><p style="margin-bottom: 0em; font-size: 11pt;">2. __________________________</p></td>
      </tr>
      @else
      <tr>
        <td width="6%"></td>
        <td style="padding-top: 1px; padding-bottom: 1px; text-align: justify;"><p style="margin-bottom: 0em; font-size: 11pt;">2. {{ $peminatan2 }}</p></td>
      </tr>
      @endif
    </tbody>
  </table>

  <table class="table table-borderless" style="height: 8%;">
    <tbody>
      @if ($usulan == "")
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Usulan berkenaan dengan Praktik Kerja Lapangan:___________________________________________</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">____________________________________________________________________________________</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">____________________________________________________________________________________</p></td>
      </tr>
      @else
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px; text-align: justify;"><p style="margin-bottom: 0em; font-size: 11pt;">Usulan berkenaan dengan Praktik Kerja Lapangan: {{ $usulan }}</p></td>
      </tr>
      @endif
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: 3em; margin-left: 22em; height: 20%;">
    <tbody>
      <tr>
        <td width="100%">
          <p style="margin-bottom: 0em; padding-left: 1.5em; padding-right: 1em; font-size: 11pt;">Bogor, {{ Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y'); }}</p>
          <p style="margin-bottom: 0em; padding-left: 1.5em; padding-right: 1em; font-size: 11pt;">Yang Menyatakan</p>
          <img src="{{url($getDosen->ttd)}}" style="margin-top: 7px; padding-left: 1.5em; padding-right: 1em; width: auto; height: 1.5cm;">
          <p style="margin-bottom: 0em; font-size: 11pt; padding-left: 1.5em; padding-right: 1em;">{{$getDosen->nama}}</p>
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: 3em; text-align: center;">
    <tbody>
      <tr>
        <td width="100%">
          <hr style="height:1px; border-width:0; color:black; background-color:black; margin-bottom: -5px;">
          <p style="margin-bottom: -5px; font-size: 11pt;">Mohon dikirim ke alamat :</p>
          <p style="margin-bottom: -5px; font-size: 11pt;">Sekolah Vokasi IPB</p>
          <p style="margin-bottom: -5px; font-size: 11pt;">Jl. Kumbang No 14 Bogor</p>
          <p style="margin-bottom: -5px; font-size: 11pt;">Telp/Fax. : +62 251 8329101</p>
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless">
    <tbody>
      <tr>
        <td style="padding-bottom: 0px;">
        <table class="table table-bordered" id="footer">
          <tbody>
            <tr>
              <td style="font-size: 10pt; text-align: center; font-family: Arial, Helvetica, sans-serif;" width="40%">No. Revisi : 0</td>
              <td style="font-size: 10pt; text-align: center; font-family: Arial, Helvetica, sans-serif;" width="10%">Hal: 1/1</td>
              <td style="font-size: 10pt; text-align: center; font-family: Arial, Helvetica, sans-serif;" width="50%">Tanggal Berlaku: 09 Oktober 2021</td>
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