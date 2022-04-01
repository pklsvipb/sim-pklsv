<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{public_path('css_pdf/bootstrap.min.css')}}">


  <title>Moderator Kolokium PDF</title>
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
          <img src="{{public_path('images/logo-form.jpg')}}" style="width: 2.06cm; height: 2.06cm; margin-top: 2px;">
        </td>
        <td width="60%" style="text-align:center;">
          <p>&nbsp;</p>
          <p style="margin-bottom: -2px; font-family: Arial, Helvetica, sans-serif; font-size: 11pt; margin-top: -7;"> KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN </p>
          <p style="margin-bottom: -2px; font-family: Arial, Helvetica, sans-serif; font-size: 11pt;"> INSTITUT PERTANIAN BOGOR </p>
          <p style="margin-bottom: -2px; font-family: Arial, Helvetica, sans-serif; font-size: 12pt; font-weight: 600;"> SEKOLAH VOKASI </p>
          <p style="margin-bottom: -2px; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;"> Kampus IPB Cilibende, Jl. Kumbang No.14 Bogor 16151 </p>
          <p style="margin-bottom: -3em; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;"> Telp. /Fax. (0251) 83480007/8376845 </p>
        </td>
        <td width="20%">
          <p style="text-align: right; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;">FRM/SV/PKL/029</p>
        </td>
      </tr>
      <tr>
        <td colspan="3" style="text-align: center;">
          <hr style="height:1px; margin-bottom:-15px; margin-top: 8px; border-width:0; background-color:black">
          <hr style="height:3px; border-width:0; background-color:black; margin-bottom: 2px;">

          <p style="margin-bottom: -7px;"><b>BERITA ACARA KOLOKIUM</b></p>
          <p style="margin-bottom: -7px;"><b>PROGRAM STUDI {{strtoupper($mhs->prodi)}}</b></p>
          <p style="margin-bottom: -7px;"><b>TAHUN AKADEMIK 2021/2022</b></p>

          <hr style="height:1px; margin-bottom: -15px; border-width:0; background-color:black">
          <hr style="height:3px; border-width:0; background-color:black; margin-bottom: -6em;">
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: -1em; height: 25%;">
    <tbody>
      <tr>
        <td width="24%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Nama Penyaji</p></td>
        <td width="1%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td width="75%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ $mhs->nama }}</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">NIM</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ $mhs->nim }}</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Hari/tanggal</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ Carbon\Carbon::parse($data->tgl)->translatedFormat('l/ d F Y'); }}</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Waktu</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ date('H:i', strtotime($data->waktu)) }}</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Rencana Tugas Akhir</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ $data->judul }}</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Lokasi Tugas Akhir</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">{{ $data->lokasi }}</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Kelayakan</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;">
          <p style="margin-bottom: 0em; font-size: 11pt; margin-left: -1em;">
            @if ($bap->kelayakan == "ya")
                Ya/<s>Tidak</s>
            @else
                <s>Ya</s>/Tidak
            @endif
          </p>
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: 1.5em;">
    <tbody>
      <tr>
        <td width="100%">
          <p style="margin-bottom: 0em; margin-left: 22.5em; margin-right: 0px; font-size: 11pt;">Bogor, {{ Carbon\Carbon::parse($bap->tgl)->translatedFormat('d F Y'); }}</p>
          <p style="margin-bottom: 0em; margin-left: 22.5em; margin-right: 0px; font-size: 11pt;">Moderator</p>
          <img src="{{public_path($bap->ttd)}}" style="margin-left: 21em; margin-top: 7px; width: auto; height: 1.5cm;">
          <p style="margin-bottom: 0em; margin-left: 22.5em; margin-right: 0px; font-size: 11pt;">{{$dosen->nama}}</p>
          <p style="margin-bottom: 0em; margin-left: 22.5em; margin-right: 0px; font-size: 11pt;">NPI. {{$dosen->nip}}</p>
          <br><br><br>
        </td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: 18%;">
    <tbody>
      <tr>
        <td style="padding-bottom: 0px; padding-top: 0px;">
        <table class="table table-bordered" id="footer">
          <tbody>
            <tr>
              <td style="font-size: 10pt; text-align: center; font-family: Arial, Helvetica, sans-serif;" width="40%">No. Revisi : 0</td>
              <td style="font-size: 10pt; text-align: center; font-family: Arial, Helvetica, sans-serif;" width="10%">Hal: 1/1</td>
              <td style="font-size: 10pt; text-align: center; font-family: Arial, Helvetica, sans-serif;" width="50%">Tanggal Berlaku: 09 Oktober 2020</td>
            </tr>
          </tbody>
        </table>
        </td>
      </tr>
    </tbody>
  </table>

  <script src="{{public_path('css_pdf/jquery-3.2.1.slim.min.js')}}"></script>
  <script src="{{public_path('css_pdf/popper.min.js')}}"></script>
  <script src="{{public_path('css_pdf/bootstrap.min.js')}}"></script>
</body>

</html>