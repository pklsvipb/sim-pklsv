<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{public_path('css_pdf/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{public_path('admin_asset/plugins/fontawesome-free/css/all.min.css')}}">

  <title>Kartu Seminar</title>
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
  </style>
</head>

<body>
  <header>
    <table class="table table-borderless">
      <tbody>
        <tr>
          <td colspan="3">
            <p style="margin-bottom: -50%; text-align: right; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;">FRM/SV/PKL/017</p>
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



  <main>
    <table class="table table-borderless">
      <tbody>
        <tr>
          <td colspan="3" style="padding-top: 0px;">
            <p style="margin-bottom: 20px; margin-top: -.8em; font-size: 14pt; text-align: center;"><b>KARTU SEMINAR</b></p>
            <p style="font-size: 11pt; text-align: center; "><b>PROGRAM STUDI {{strtoupper($mahasiswa->getProdi->nama)}}</b></p>
            <p style="margin-bottom: 15px; margin-top: -1rem; font-size: 11pt; text-align: center; "><b>TAHUN AKADEMIK 2021/2022</b></p>
            <img src="{{public_path($mahasiswa->foto)}}" style="width: 3cm; height: 4cm; float: right; margin-top: -6rem;">
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
            <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -4em;">{{$mahasiswa->nama}}</p>
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
            <p style="margin-bottom: 0.3em; font-size: 11pt; margin-left: -4em;">{{$mahasiswa->nim}}</p>
          </td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered" style="padding-right: 14px; padding-left: 10px; line-height: 100%;">
      <thead>
        <tr>
          <td width="5%" style="padding: 5px; font-size: 11pt; text-align: center; vertical-align: middle;">No</td>
          <td style="padding: 5px; font-size: 11pt; text-align: center; vertical-align: middle;">Hari/Tanggal</td>
          <td width="10%" style="padding: 5px; font-size: 11pt; text-align: center; vertical-align: middle;">Waktu</td>
          <td style="padding: 5px; font-size: 11pt; text-align: center; vertical-align: middle;">Nama Pemrasaran</td>
          <td width="10%" style="padding: 5px; font-size: 11pt; text-align: center; vertical-align: middle;">NIM</td>
          <td style="padding: 5px; font-size: 11pt; text-align: center; vertical-align: middle;">Moderator</td>
          <td width="7%" style="padding: 5px; font-size: 11pt; text-align: center; vertical-align: middle;">Paraf Pembimbing Lapangan</td>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; ?>
        @foreach($kartu as $list)
        <tr>
          <td style="padding: 5px; padding-bottom: 10px; font-size: 11pt; text-align: center;">{{$no}}</td>
          <td style="padding: 5px; padding-bottom: 10px; font-size: 11pt; text-align: center;">{{Carbon\Carbon::parse($list->tanggal)->translatedFormat('l, d F Y');}}</td>
          <td style="padding: 5px; padding-bottom: 10px; font-size: 11pt; text-align: center;">{{substr($list->waktu,0,5)}}</td>
          <td style="padding: 5px; padding-bottom: 10px; font-size: 11pt; text-align: left;">{{$list->nama_pemrasaran}}</td>
          <td style="padding: 5px; padding-bottom: 10px; font-size: 11pt; text-align: center;">{{$list->nim_pemrasaran}}</td>
          <td style="padding: 5px; padding-bottom: 10px; font-size: 11pt; text-align: left;">{{$list->getDosen->nama}}</td>
          <td style="padding: 5px; padding-bottom: 10px; font-size: 11pt; text-align: center;"><img src="{{public_path($list->getDosen->ttd)}}" style="height: 1cm; width: 1.5cm;"></td>
        </tr>
        <?php $no += 1; ?>
        @endforeach
      </tbody>
    </table>
  </main>

  <script src="{{public_path('css_pdf/jquery-3.2.1.slim.min.js')}}"></script>
  <script src="{{public_path('css_pdf/popper.min.js')}}"></script>
  <script src="{{public_path('css_pdf/bootstrap.min.js')}}"></script>
</body>

</html>