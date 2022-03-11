<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css_pdf/bootstrap.min.css')}}">


  <title>Form Penggunaan Produk PDF</title>
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
  <table class="table table-borderless" style="margin-top: 2em;">
    <tbody>
      <tr>
        <td style="text-align: center;">
          <p style="margin-bottom: -7px;"><b>PERNYATAAN PENGGUNAAN PRODUK</b></p>
          <p style="margin-bottom: -7px;"><b>PRAKTIK KERJA LAPANGAN (PKL)</b></p>
          <p style="margin-bottom: -7px;"><b>PROGRAM STUDI {{strtoupper($data->getProdi->nama)}}</b></p>
          <p style="margin-bottom: -7px;"><b>TAHUN AKADEMIK 2021/2022</b></p>

          <hr style="height:1px; margin-bottom: -15px; border-width:0; background-color:black">
          <hr style="height:3px; border-width:0; background-color:black; margin-bottom: -6em;">
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: 1em; height: 8%;">
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
        <td width="22%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Dengan ini Pembimbing Lapangan PKL menyatakan bahwa karya mahasiswa berikut :</p></td>
      </tr>
  </table>

  <table class="table table-borderless" style="margin-top: 1em; height: 9%;">
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
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: -1em;">
    <tbody>
      <tr>
        <td width="22%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">yang berjudul {{ $judul }}</p></td>
      </tr>
  </table>

  <table class="table table-borderless" style="margin-top: 2em; height: 12%;">
    <tbody>
      <tr>
        <td width="5%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;"></p></td>
        <td width="95%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Telah Digunakan di Instansi *</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;"></p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Akan Digunakan di Instansi *</p></td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;"></p></td>
        <td style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">Belum Digunakan di Instansi *, karena </p></td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: -2em;">
    <tbody>
      <tr>
        <td width="22%" style="padding-top: 1px; padding-bottom: 1px;"><p style="margin-bottom: 0em; font-size: 11pt;">* Beri tanda ceklis pada lingkaran yang disediakan</p></td>
      </tr>
  </table>

  <table class="table table-borderless" style="margin-top: 3em; margin-left: 23em; height: 21%;">
    <tbody>
      <tr>
        <td width="100%">
          <p style="margin-bottom: 0em; font-size: 11pt;">................, ..............................</p>
          <p style="margin-bottom: 0em; font-size: 11pt;">Pembimbing Lapangan</p>
          <br><br><br><br>
          <p style="margin-bottom: 0em; font-size: 11pt;">( .............................................. )</p>
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