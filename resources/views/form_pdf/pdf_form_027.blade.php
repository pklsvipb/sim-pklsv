<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{public_path('css_pdf/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{public_path('admin_asset/plugins/fontawesome-free/css/all.min.css')}}">

  <title>Form 027 PDF</title>
  <style>
    body {
      font-family: "Times New Roman", Times, serif;
      margin-top: 4.2cm;
      margin-bottom: 2cm;
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
      padding-left: 10px;
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

    header {
      position: fixed;
      top: 0cm;
      left: 0cm;
      right: 0cm;
      height: 4.2cm;
    }

    /** Define the footer rules **/
    footer {
      position: fixed;
      bottom: 0cm;
      left: 0cm;
      right: 0cm;
      height: 2cm;
    }

    .pagenum:before {
      content: counter(page);
    }

    .page_break {
      page-break-before: always;
    }
  </style>
</head>

<body>
  <header>
    <table class="table table-borderless">
      <tbody>
        <tr>
          <td colspan="3">
            <p style="margin-bottom: -50%; text-align: right; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;">FRM/SV/PKL/027</p>
          </td>
        </tr>
        <tr>
          <td style="padding-bottom: 0px; padding-top: 1px; padding:1px;" width="5%">
            <p>&nbsp;</p>
            <img src="{{public_path('images/logo-form2.jpg')}}" style="width: 2.06cm; height: 2.06cm; margin-top: -2%;">
          </td>
          <td style="padding-bottom: 0px; padding-top: 1px; text-align:center;" width="80%">
            <p>&nbsp;</p>
            <p style="margin-bottom: -6px; font-family: Arial, Helvetica, sans-serif; font-size: 11pt; margin-top: -7;"> KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI </p>
            <p style="margin-bottom: -6px; font-family: Arial, Helvetica, sans-serif; font-size: 11pt;"> INSTITUT PERTANIAN BOGOR </p>
            <p style="margin-bottom: -6px; font-family: Arial, Helvetica, sans-serif; font-size: 12pt;"> <b> SEKOLAH VOKASI </b> </p>
            <p style="margin-bottom: -6px; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;"> Kampus IPB Cilibende, Jl. Kumbang No.14 Bogor 16151 </p>
            <p style="margin-bottom: -3rem; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;"> Telp. /Fax. (0251) 83480007/8376845 </p>
          </td>
          <td style="padding-bottom: 0px; padding-top: 1px;">
            <!-- <p style="text-align: right; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;">FRM/SV/PKL/004</p> -->
          </td>
        </tr>
        <tr>
          <td colspan="3" style="text-align: center; padding-top: 0px;">
            <hr style="height:1px; margin-bottom:-15px; margin-top: 8px; border-width:0; background-color:black">
            <hr style="height:3px; border-width:0; background-color:black; margin-bottom:-15px;">
          </td>
        </tr>
      </tbody>
    </table>
  </header>

  <footer>
    <table class="table table-borderless">
      <tbody>
        <tr>
          <td style="padding-bottom: 0px; padding-top: 0px;">
            <table class="table table-bordered" id="footer">
              <tbody>
                <tr>
                  <td style="padding-top:1px; font-size: 10pt; text-align: center; font-family: Arial, Helvetica, sans-serif;" width="40%">No. Revisi : 0</td>
                  <td style="padding-top:1px; font-size: 10pt; text-align: center; font-family: Arial, Helvetica, sans-serif;" width="10%">Hal: <span class="pagenum"></span>/{{$totalPages}}</td>
                  <td style="padding-top:1px; font-size: 10pt; text-align: center; font-family: Arial, Helvetica, sans-serif;" width="50%">Tanggal Berlaku: 09 Oktober 2020</td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </footer>



  <main>
    <table class="table table-borderless">
      <tbody>
        <tr>
          <td colspan="3" style="text-align: center; padding-top: 0px;">
            <p style="margin-bottom: -5px; font-size: 11pt;"><b>PERSETUJUAN PERBAIKAN UJIAN TUGAS AKHIR</b></p>
            <p style="margin-bottom: -5px; font-size: 11pt;"><b>PROGRAM STUDI {{strtoupper($mhs->getProdi->nama)}}</b></p>
            <p style="margin-bottom: -5px; font-size: 11pt;"><b>TAHUN AKADEMIK 2021/2022</b></p>
            <hr style="height:1px; margin-bottom:-15px; margin-top: 8px; border-width:0; background-color:black">
            <hr style="height:3px; border-width:0; background-color:black; margin-bottom: 20px;">
          </td>
        </tr>
        <tr>
          <td width="32%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 0.3em; font-size: 11pt;">Nama Mahasiswa</p>
          </td>
          <td width="1%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -3em;">:</p>
          </td>
          <td width="67%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -4em;">{{$mhs->nama}}</p>
          </td>
        </tr>
        <tr>
          <td width="32%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 0.3em; font-size: 11pt;">NIM</p>
          </td>
          <td width="1%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -3em;">:</p>
          </td>
          <td width="67%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -4em;">{{$mhs->nim}}</p>
          </td>
        </tr>
        <tr>
          <td width="32%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 0.3em; font-size: 11pt;">Judul Laporan Akhir</p>
          </td>
          <td width="1%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -3em;">:</p>
          </td>
          <td width="67%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -4em;">{{$data->judul}}</p>
          </td>
        </tr>
        <tr>
          <td width="32%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 0.3em; font-size: 11pt;">Hari/Tanggal Ujian</p>
          </td>
          <td width="1%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -3em;">:</p>
          </td>
          <td width="67%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -4em;">{{Carbon\Carbon::parse($data->tgl)->translatedFormat('l/d F Y');}}</p>
          </td>
        </tr>
        <tr>
          <td width="32%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 0.3em; font-size: 11pt;">Waktu Ujian</p>
          </td>
          <td width="1%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -3em;">:</p>
          </td>
          <td width="67%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -4em;">{{substr($data->waktu,0,5)}}</p>
          </td>
        </tr>
        <tr>
          <td width="32%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 1em; font-size: 11pt;">Nama Dosen Penguji</p>
          </td>
          <td width="1%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 1em; font-size: 11pt; margin-left: -3em;">:</p>
          </td>
          <td width="67%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
            <p style="margin-bottom: 1em; font-size: 11pt; margin-left: -4em;">{{$data->getDosji->nama}}</p>
          </td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered" style="padding-right: 14px; padding-left: 10px; line-height: 100%;">
      <thead>
        <tr>
          <th style="font-size: 11pt; text-align: center; vertical-align: middle;" width="10%">No</th>
          <th style="font-size: 11pt; text-align: center; vertical-align: middle;">Koreksi/Saran Dosen Penguji</th>
          <th style="font-size: 11pt; text-align: center; vertical-align: middle;">Perbaikan</th>
        </tr>
      </thead>
      <tbody>
        @for($i=0; $i < count($k_penguji); $i++) 
        <tr>
          <td style="padding: 5px; padding-bottom: 30px; font-size: 11pt; text-align: center;">{{$i+1}}</td>
          <td style="padding: 5px; padding-bottom: 30px; font-size: 11pt; text-align: left;">{{$k_penguji[$i]}}</td>
          <td style="padding: 5px; padding-bottom: 30px; font-size: 11pt; text-align: left;">{{$p_penguji[$i]}}</td>
        </tr>
        @endfor
      </tbody>
    </table>

    <div class="page_break"></div>

    <br>
    <table class="table table-bordered" style="padding-right: 14px; padding-left: 10px; line-height: 100%;">
      <thead>
        <tr>
          <th style="font-size: 11pt; text-align: center; vertical-align: middle;" width="10%">No</th>
          <th style="font-size: 11pt; text-align: center; vertical-align: middle;">Koreksi/Saran Dosen Pembimbing</th>
          <th style="font-size: 11pt; text-align: center; vertical-align: middle;">Perbaikan</th>
        </tr>
      </thead>
      <tbody>
        @for($i=0; $i < count($k_pembimbing); $i++)
        <tr>
          <td style="padding: 5px; padding-bottom: 30px; font-size: 11pt; text-align: center;">{{$i+1}}</td>
          <td style="padding: 5px; padding-bottom: 30px; font-size: 11pt; text-align: left;">{{$k_pembimbing[$i]}}</td>
          <td style="padding: 5px; padding-bottom: 30px; font-size: 11pt; text-align: left;">{{$p_pembimbing[$i]}}</td>
        </tr>
        @endfor
      </tbody>
    </table>
    
    <br>
    <table class="table table-borderless" style="padding-right: 14px; padding-left: 10px; line-height: 100%;">
      <tbody>
          <tr>
            <td colspan="3" style="text-align: right; font-size: 11pt; padding: 5px;">Bogor, {{ Carbon\Carbon::now()->translatedFormat('d F Y'); }}</td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center; font-size: 11pt; padding: 5px;">Disetujui oleh</td>
            <td></td>
          </tr>
          <tr>
            <td style="padding: 5px;">
              <p style="margin-bottom: -.10em; font-size: 11pt;">Dosen Pembimbing</p>
              <p style="height: 1.2cm;"></p>
              <p style="margin-bottom: -.10em; font-size: 11pt;">{{$data->getDosen->nama}}</p>
              <p style="margin-bottom: -.10em; font-size: 11pt;">NIP. {{$data->getDosen->nip}}</p>
            </td>
            <td></td>
            <td style="padding: 5px; float: right;">
              <p style="margin-bottom: -.10em; font-size: 11pt;">Dosen Penguji</p>
              <p style="height: 1.2cm;"></p>
              <p style="margin-bottom: -.10em; font-size: 11pt;">{{$data->getDosji->nama}}</p>
              <p style="margin-bottom: -.10em; font-size: 11pt;">NIP. {{$data->getDosji->nip}}</p>
            </td>
          </tr>
      </tbody>
    </table>
  </main>

  <script src="{{public_path('css_pdf/jquery-3.2.1.slim.min.js')}}"></script>
  <script src="{{public_path('css_pdf/popper.min.js')}}"></script>
  <script src="{{public_path('css_pdf/bootstrap.min.js')}}"></script>
</body>

</html>