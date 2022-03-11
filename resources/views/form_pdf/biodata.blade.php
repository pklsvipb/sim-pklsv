<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css_pdf/bootstrap.min.css')}}">


  <title>Biodata Mahasiswa PDF</title>
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

  <table class="table table-borderless" style="margin-top: 3em; height: 18%;">
    <tbody>
      <tr>
        <td width="8%"></td>
        <td width="65%" style="text-align: center;">
          <p style="margin-bottom: -7px;"><b>BIODATA MAHASISWA</b></p>
          <p style="margin-bottom: -7px;"><b>PROGRAM STUDI {{strtoupper($data->getProdi->nama)}}</b></p>
          <p style="margin-bottom: -7px;"><b>SEKOLAH VOKASI IPB</b></p>
          <p style="margin-bottom: -7px;"><b>TAHUN AKADEMIK 2021/2022</b></p>
        </td>
        <td width="27%">
          <img src="{{$data->foto}}" style="width: 4cm; margin-top: -2em;">
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: 1em; height: 11%;">
    <tbody>
      <tr>
        <td width="8%"></td>
        <td width="29%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">Nama</p></td>
        <td width="1%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">:</p></td>
        <td width="62%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt; margin-left: -1em;">{{ $data->nama }}</p></td>
      </tr>
      <tr>
        <td></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">NIM</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt; margin-left: -1em;">{{ $data->nim }}</p></td>
      </tr>
      <tr>
        <td></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">Tempat /Tanggal Lahir</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt; margin-left: -1em;">{{ $data->tempat_lahir }}, {{ Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y'); }}</p></td>
      </tr>
      <tr>
        <td></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">Alamat Terbaru</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt; margin-left: -1em;">{{ $data->alamat }}</p></td>
      </tr>
      <tr>
        <td></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">No. Telf. / HP</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt; margin-left: -1em;">{{ $data->no_tlp }}</p></td>
      </tr>
      <tr>
        <td></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">Email</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt; margin-left: -1em;">{{ $data->email }}</p></td>
      </tr>
      <tr>
        <td></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">Asal SMA /Tahun Lulus</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt; margin-left: -1em;">{{ $data->asal_sma }} / {{ $data->tahun_lulus }}</p></td>
      </tr>
      <tr>
        <td></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">Tahun Masuk IPB</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt; margin-left: -1em;">{{ $data->tahun_masuk }}</p></td>
      </tr>
      <tr>
        <td></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">Jalur</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;">
            @if ($data->jalur == "usmi")
            <p style="margin-bottom: 0em; font-size: 12pt; margin-left: -1em;">USMI / <s>Reguler</s>
            @else
            <p style="margin-bottom: 0em; font-size: 12pt; margin-left: -1em;"><s>USMI</s> / Reguler 
            @endif
        </td>
      </tr>
      <tr>
        <td></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">Nilai</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">:</p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"></td>
      </tr>
    </tbody>
  </table>
  <br>

  <table border="1" style="margin-left:auto; margin-right:auto; text-align: center;">
    <tbody>
      <tr>
        <td width="80px">Tingkat</td>
        <td width="110px">I</td>
        <td width="110px">II</td>
      </tr>
      <tr>
        <td>IPK</td>
        <td>{{$data->ipk1}}</td>
        <td>{{$data->ipk2}}</td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: 3em; margin-left: 23em; height: 15%;">
    <tbody>
      <tr>
        <td width="100%">
          <p style="margin-bottom: 0em; font-size: 12pt;">Bogor, {{ Carbon\Carbon::now()->translatedFormat('d F Y'); }}</p>
          <p style="margin-bottom: 0em; font-size: 12pt;">Tanda Tangan</p>
          @if (empty($data->ttd))
          <p style="height: 1.3cm;"><br></p>
          @else
          <img src="{{$data->ttd}}" style="margin-top: 7px; width: auto; height: 2cm;">
          @endif
          <p style="margin-bottom: 0em; font-size: 12pt;">{{ $data->nama }}</p>
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-bottom: -2em;">
    <tbody>
      <tr>
        <td width="8%"></td>
        <td width="92%" style="padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 12pt;">Keterangan : *) <i>Coret yang tidak perlu</i></p></td>
      </tr>
    </tbody>
  </table>

  <script src="{{asset('css_pdf/jquery-3.2.1.slim.min.js')}}"></script>
  <script src="{{asset('css_pdf/popper.min.js')}}"></script>
  <script src="{{asset('css_pdf/bootstrap.min.js')}}"></script>
</body>

</html>