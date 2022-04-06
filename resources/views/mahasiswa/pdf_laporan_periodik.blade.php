<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{public_path('css_pdf/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{public_path('admin_asset/plugins/fontawesome-free/css/all.min.css')}}">

  <title>Laporan Periodik</title>
  <style>
    body {
      font-family: "Times New Roman", Times, serif;
      margin-top: 4.5cm;
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
      height: 4.5cm;
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
            <p style="margin-bottom: -50%; text-align: right; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;">FRM/SV/PKL/010</p>
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
            <hr style="height:3px; border-width:0; background-color:black; margin-bottom: 10px;">
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

  <?php for ($i = 0; $i < count($periode); $i++) { ?>
    <main>
      <table class="table table-borderless">
        <tbody>
          <tr>
            <td colspan="3" style="padding-top: 0px;">
              <p style="margin-bottom: 10px; margin-top: 10px; font-size: 14pt; text-align: center;"><b>LAPORAN PERIODIK PKL</b></p>
            </td>
          </tr>
          <tr>
            <td width="32%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
              <p style="margin-bottom: 0.3em; font-size: 11pt;">Periode laporan</p>
            </td>
            <td width="1%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
              <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -3em;">:</p>
            </td>
            <td width="67%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
              <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -4em;">{{ Carbon\Carbon::parse($periode[$i][1])->translatedFormat('l, d F Y'); }} - {{ Carbon\Carbon::parse($periode[$i][2])->translatedFormat('l, d F Y'); }}</p>
            </td>
          </tr>
          <tr>
            <td width="32%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
              <p style="margin-bottom: 0.3em; font-size: 11pt;">Nama</p>
            </td>
            <td width="1%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
              <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -3em;">:</p>
            </td>
            <td width="67%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
              <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -4em;">{{$datas->nama}}</p>
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
              <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -4em;">{{$datas->nim}}</p>
            </td>
          </tr>
          <tr>
            <td width="32%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
              <p style="margin-bottom: 0.3em; font-size: 11pt;">Program Studi</p>
            </td>
            <td width="1%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
              <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -3em;">:</p>
            </td>
            <td width="67%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
              <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -4em;">{{$datas->getProdi->nama}}</p>
            </td>
          </tr>
          <tr>
            <td width="32%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
              <p style="margin-bottom: 0.3em; font-size: 11pt;">Nama Perusahaan/Instansi</p>
            </td>
            <td width="1%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
              <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -3em;">:</p>
            </td>
            <td width="67%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
              <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -4em;">{{$datas->instansi}}</p>
            </td>
          </tr>
          <tr>
            <td width="32%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
              <p style="margin-bottom: 0.3em; font-size: 11pt;">Alamat</p>
            </td>
            <td width="1%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
              <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -3em;">:</p>
            </td>
            <td width="67%" style="padding-top: 1px; padding-bottom: 1px; line-height: 100%;">
              <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -4em;">{{$datas->alamat_instansi}}</p>
            </td>
          </tr>
        </tbody>
      </table>

      <table class="table table-bordered" style="padding-right: 14px; padding-left: 10px; line-height: 100%;">
        <thead>
          <tr>
            <td width="20%" style="padding: 7px; font-size: 11pt; text-align: center; vertical-align: middle;">Tanggal</td>
            <td style="padding: 7px; font-size: 11pt; text-align: center; vertical-align: middle;">Informasi yang diperoleh</td>
            <td style="padding: 7px; font-size: 11pt; text-align: center; vertical-align: middle;">Masalah/Kendala</td>
          </tr>
        </thead>
        <tbody>
          <?php for ($j = 0; $j < count($periodik); $j++) { ?>
            @if($periode[$i][1] == $periodik[$j][7] && $periode[$i][2] == $periodik[$j][8])
            <tr>
              <td style="padding: 7px; padding-bottom: 10px; font-size: 11pt; text-align: center; border-bottom:none; border-top:none;">{{ Carbon\Carbon::parse($periodik[$j][3])->translatedFormat('d F Y'); }}</td>
              <td style="padding: 7px; padding-bottom: 10px; font-size: 11pt; text-align: justify; border-bottom:none; border-top:none;">{{ $periodik[$j][4] }}</td>
              <td style="padding: 7px; padding-bottom: 10px; font-size: 11pt; text-align: justify; border-bottom:none; border-top:none;">{{ $periodik[$j][5] }}</td>
            </tr>
            @endif
          <?php } ?>
        </tbody>
      </table>
      <table class="table table-borderless" style="padding-right: 14px; padding-left: 10px; line-height: 100%;">
        <tbody>
          <tr>
            <td style="padding: 7px; padding-bottom: 10px; font-size: 11pt; text-align: justify;">
              Catatan Khusus: <br>
              <?php 
              $get = array();
              for ($h = 0; $h < count($periodik); $h++) {
                if ($periode[$i][1] == $periodik[$h][7] && $periode[$i][2] == $periodik[$h][8] && $periodik[$h][6] != '') {
                  $get[] = $periodik[$h][6];
                }
              } 
              
              echo implode(', ',$get);
              ?>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="table table-borderless">
        <tbody>
          <tr>
            <td width="100%" style="padding-top: 1px; margin-top: -.1rem;">
              <p style="margin-bottom: -.45em; margin-left: 23em; margin-right: 0px; font-size: 11pt;">Bogor, {{ Carbon\Carbon::parse($periode[$i][2])->translatedFormat('d F Y'); }}</p>
              <p style="margin-bottom: -.10em; margin-top: 1rem; margin-left: 23em; margin-right: 0px; font-size: 11pt;">Mengetahui,</p>
              <p style="margin-bottom: -.10em; margin-left: 23em; margin-right: 0px; font-size: 11pt;">Pembimbing Lapangan</p>
              <p style="margin-left: 23em; margin-right: 0px; height: 1.2cm;"></p>
              <p style="margin-bottom: -.10em; margin-left: 23em; margin-right: 0px; font-size: 11pt;">{{$datas->pembimbing_lapang}}</p>
            </td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </main>
    @if($i < (count($periode) - 1)) 
    <div class="page_break"></div>
    @endif
    <?php } ?>

    <script src="{{public_path('css_pdf/jquery-3.2.1.slim.min.js')}}"></script>
    <script src="{{public_path('css_pdf/popper.min.js')}}"></script>
    <script src="{{public_path('css_pdf/bootstrap.min.js')}}"></script>
</body>

</html>