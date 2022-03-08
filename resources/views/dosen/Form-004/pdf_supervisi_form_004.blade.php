<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{public_path('css_pdf/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{public_path('admin_asset/plugins/fontawesome-free/css/all.min.css')}}">

  <title>Dosen Penjajakan Lokasi PKL</title>
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
      padding: 5px; padding-left: 10px;
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
        <td style="padding-bottom: 0px; padding-top: 1px;" width="20%">
          <p>&nbsp;</p>
          <img src="{{public_path('images/logo-form2.jpg')}}" style="width: 2.06cm; height: 2.06cm; margin-top: 2px;">
        </td>
        <td style="padding-bottom: 0px; padding-top: 1px; text-align:center;" width="60%">
          <p>&nbsp;</p>
          <p style="margin-bottom: -6px; font-family: Arial, Helvetica, sans-serif; font-size: 11pt; margin-top: -7;"> KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN </p>
          <p style="margin-bottom: -6px; font-family: Arial, Helvetica, sans-serif; font-size: 11pt;"> INSTITUT PERTANIAN BOGOR </p>
          <p style="margin-bottom: -6px; font-family: Arial, Helvetica, sans-serif; font-size: 12pt;"> <b> SEKOLAH VOKASI </b> </p>
          <p style="margin-bottom: -6px; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;"> Kampus IPB Cilibende, Jl. Kumbang No.14 Bogor 16151 </p>
          <p style="margin-bottom: -3rem; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;"> Telp. /Fax. (0251) 83480007/8376845 </p>
        </td>
        <td style="padding-bottom: 0px; padding-top: 1px;" width="20%">
          <p style="text-align: right; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;">FRM/SV/PKL/004</p>
        </td>
      </tr>
      <tr>
        <td colspan="3" style="text-align: center; padding-top: 0px;">
          <hr style="height:1px; margin-bottom:-15px; margin-top: 8px; border-width:0; background-color:black">
          <hr style="height:3px; border-width:0; background-color:black; margin-bottom: 2px;">

          <p style="margin-bottom: -7px;"><b>PENILAIAN KELAYAKAN LOKASI PKL</b></p>
          <p style="margin-bottom: -7px;"><b>PROGRAM STUDI {{strtoupper($daftar->getProdi->nama)}}</b></p>
          <p style="margin-bottom: -7px;"><b>TAHUN AKADEMIK 2021/2022</b></p>

          <hr style="height:1px; margin-bottom: -15px; border-width:0; background-color:black">
          <hr style="height:3px; border-width:0; background-color:black; margin-bottom: -6em;">
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: -1em; height: 12%;">
    <tbody>
      <tr>
        <td width="34%" style="padding-top: 1px; padding-bottom: 1px;">
          <p style="margin-bottom: 0em; font-size: 10pt;">Nama Perusahaan/Instansi</p>
        </td>
        <td width="1%" style="padding-top: 1px; padding-bottom: 1px;">
          <p style="margin-bottom: 0em; font-size: 10pt; margin-left: -1.5em;">:</p>
        </td>
        <td width="65%" style="padding-top: 1px; padding-bottom: 1px;">
          <p style="margin-bottom: 0em; font-size: 10pt; margin-left: -2.5em;">{{ $daftar->instansi }}</p>
        </td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;">
          <p style="margin-bottom: 0em; font-size: 10pt;">Alamat</p>
        </td>
        <td style="padding-top: 1px; padding-bottom: 1px;">
          <p style="margin-bottom: 0em; font-size: 10pt; margin-left: -1.5em;">:</p>
        </td>
        <td style="padding-top: 1px; padding-bottom: 1px;">
          <p style="margin-bottom: 0em; font-size: 10pt; margin-left: -2.5em;">{{ $daftar->alamat_instansi }}</p>
        </td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;">
          <p style="margin-bottom: 0em; font-size: 10pt;">Bidang Usaha</p>
        </td>
        <td style="padding-top: 1px; padding-bottom: 1px;">
          <p style="margin-bottom: 0em; font-size: 10pt; margin-left: -1.5em;">:</p>
        </td>
        <td style="padding-top: 1px; padding-bottom: 1px;">
          <p style="margin-bottom: 0em; font-size: 10pt; margin-left: -2.5em;">{{ $daftar->bidang_usaha }}</p>
        </td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;">
          <p style="margin-bottom: 0em; font-size: 10pt;">Dosen Penjajakan Lokasi PKL</p>
        </td>
        <td style="padding-top: 1px; padding-bottom: 1px;">
          <p style="margin-bottom: 0em; font-size: 10pt; margin-left: -1.5em;">:</p>
        </td>
        <td style="padding-top: 1px; padding-bottom: 1px;">
          <p style="margin-bottom: 0em; font-size: 10pt; margin-left: -2.5em;">{{ $supervisi->getDosen->nama }}</p>
        </td>
      </tr>
      <tr>
        <td style="padding-top: 1px; padding-bottom: 1px;">
          <p style="margin-bottom: 0em; font-size: 10pt;">Tanggal Penjajakan Lokasi PKL</p>
        </td>
        <td style="padding-top: 1px; padding-bottom: 1px;">
          <p style="margin-bottom: 0em; font-size: 10pt; margin-left: -1.5em;">:</p>
        </td>
        <td style="padding-top: 1px; padding-bottom: 1px;">
          <p style="margin-bottom: 0em; font-size: 10pt; margin-left: -2.5em;">{{ Carbon\Carbon::parse($daftar->tanggal)->translatedFormat('d F Y'); }}</p>
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-bordered">
    <tbody>
      <tr>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt; text-align: center;" width="5%">No</td>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt; text-align: center;" width="40%">Keterangan</td>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt; text-align: center;" width="45%">Penilaian</td>
      </tr>

      <tr>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt; text-align: center;">1</td>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt;">Perkembangan Usaha 3 tahun terakhir</td>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt;">
        @if ($supervisi->penilaian_1 == "Meningkat")
          <p style="font-size: 10pt;">a.<i class="far fa-circle" style="margin-top: .33rem; margin-left: -4.3%;"></i> Meningkat</p>
        @else
          <p style="font-size: 10pt;">a. Meningkat</p>
        @endif
        @if ($supervisi->penilaian_1 == "Statis")
          <p style="font-size: 10pt; margin-top: -1.3rem;">b.<i class="far fa-circle" style="margin-top: .33rem; margin-left: -4.3%;"></i> Statis</p>
        @else
          <p style="font-size: 10pt; margin-top: -1.3rem;">b. Statis</p>
        @endif
        @if ($supervisi->penilaian_1 == "Menurun")
          <p style="font-size: 10pt; margin-top: -1.3rem; margin-bottom: -.10rem;">c.<i class="far fa-circle" style="margin-top: .33rem; margin-left: -4.3%;"></i> Menurun</p>
        @else
          <p style="font-size: 10pt; margin-top: -1.3rem; margin-bottom: -.10rem;">c. Menurun</p>
        @endif
        </td>
      </tr>

      <tr>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt; text-align: center;">2</td>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt;">Perencanaaan Usaha di masa yang akan datang</td>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt;">
        @if ($supervisi->penilaian_2 != "Tidak Ada")
          <p style="font-size: 10pt; line-height: 90%;letter-spacing: 0.1px;">a.<i class="far fa-circle" style="margin-top: .33rem; margin-left: -4.3%;"></i> {{$supervisi->penilaian_2}}</p>
        @else
          <p style="font-size: 10pt;">a. Ada rencana pengembangan usaha</p>
        @endif
        @if ($supervisi->penilaian_2 == "Tidak Ada")
          <p style="font-size: 10pt; margin-top: -1.3rem; margin-bottom: -.10rem;">b.<i class="far fa-circle" style="margin-top: .33rem; margin-left: -4.3%;"></i> Tidak Ada</p>
        @else
          <p style="font-size: 10pt; margin-top: -1.2rem; margin-bottom: -.10rem;">b. Tidak Ada</p>
        @endif
        </td>
      </tr>

      <tr>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt; text-align: center;">3</td>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt;">Kegiatan Usaha</td>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt;">
        @if ($supervisi->penilaian_3 == "Sangat Aktif")
          <p style="font-size: 10pt;">a.<i class="far fa-circle" style="margin-top: .33rem; margin-left: -4.3%;"></i> Sangat Aktif</p>
        @else
          <p style="font-size: 10pt;">a. Sangat Aktif</p>
        @endif
        @if ($supervisi->penilaian_3 == "Cukup Aktif")
          <p style="font-size: 10pt; margin-top: -1.3rem;">b.<i class="far fa-circle" style="margin-top: .33rem; margin-left: -4.3%;"></i> Cukup Aktif</p>
        @else
          <p style="font-size: 10pt; margin-top: -1.3rem;">b. Cukup Aktif</p>
        @endif
        @if ($supervisi->penilaian_3 == "Kurang Aktif")
          <p style="font-size: 10pt; margin-top: -1.3rem; margin-bottom: -.10rem;">c.<i class="far fa-circle" style="margin-top: .33rem; margin-left: -4.3%;"></i> Kurang Aktif</p>
        @else
          <p style="font-size: 10pt; margin-top: -1.3rem; margin-bottom: -.10rem;">c. Kurang Aktif</p>
        @endif
        </td>
      </tr>

      <tr>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt; text-align: center;">4</td>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt;">Penerimaan Perusahaan/ Instansi</td>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt;">
        @if ($supervisi->penilaian_4 == "Sangat Mendukung")
          <p style="font-size: 10pt;">a.<i class="far fa-circle" style="margin-top: .33rem; margin-left: -4.3%;"></i> Sangat Mendukung</p>
        @else
          <p style="font-size: 10pt;">a. Sangat Mendukung</p>
        @endif
        @if ($supervisi->penilaian_4 == "Cukup Mendukung")
          <p style="font-size: 10pt; margin-top: -1.3rem;">b.<i class="far fa-circle" style="margin-top: .33rem; margin-left: -4.3%;"></i> Cukup Mendukung</p>
        @else
          <p style="font-size: 10pt; margin-top: -1.3rem;">b. Cukup Mendukung</p>
        @endif
        @if ($supervisi->penilaian_4 == "Kurang Mendukung")
          <p style="font-size: 10pt; margin-top: -1.3rem; margin-bottom: -.10rem;">c.<i class="far fa-circle" style="margin-top: .33rem; margin-left: -4.3%;"></i> Kurang Mendukung</p>
        @else
          <p style="font-size: 10pt; margin-top: -1.3rem; margin-bottom: -.10rem;">c. Kurang Mendukung</p>
        @endif
        </td>
      </tr>

      <tr>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt; text-align: center;">5</td>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt;">Kelayakan sebagai lokasi PKL</td>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt;">
        @if ($supervisi->penilaian_5 == "Layak")
          <p style="font-size: 10pt;">a.<i class="far fa-circle" style="margin-top: .33rem; margin-left: -4.3%;"></i> Layak</p>
        @else
          <p style="font-size: 10pt;">a. Layak</p>
        @endif
        @if ($supervisi->penilaian_5 == "Tidak Layak")
          <p style="font-size: 10pt; margin-top: -1.3rem; margin-bottom: -.10rem;">c.<i class="far fa-circle" style="margin-top: .33rem; margin-left: -4.3%;"></i> Tidak Layak</p>
        @else
          <p style="font-size: 10pt; margin-top: -1.3rem; margin-bottom: -.10rem;">c. Tidak Layak</p>
        @endif
        </td>
      </tr>

      <tr>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt; text-align: center;">6</td>
        <td colspan="2" style="padding: 5px; padding-left: 10px; font-size: 10pt;">
        Harapan Perusahaan/Instansi untuk kegiatan PKL :
        @if ($value6[0] == "Tidak ada")
          <p style="font-size: 10pt; margin-bottom: -.10rem;">a. {{$value6[0]}}</p>
          <p style="font-size: 10pt; margin-bottom: -.10rem;">b. -------------------------------------------------------- </p>
        @elseif ($value6[0] != "Tidak ada" && empty($value6[1]) )
          <p style="font-size: 10pt; margin-bottom: -.10rem;">a. {{$value6[0]}}</p>
          <p style="font-size: 10pt; margin-bottom: -.10rem;">b. -------------------------------------------------------- </p>
        @elseif ($value6[0] != "Tidak ada" && !empty($value6[1]) )
          <p style="font-size: 10pt; margin-bottom: -.10rem;">a. {{$value6[0]}}</p>
          <p style="font-size: 10pt; margin-bottom: -.10rem;">b. {{$value6[1]}} </p>
        @endif
        </td>
      </tr>

      <tr>
        <td style="padding: 5px; padding-left: 10px; font-size: 10pt; text-align: center;">7</td>
        <td colspan="2" style="padding: 5px; padding-left: 10px; font-size: 10pt;">
        Lain-lain :
        @if ($value7[0] == "Tidak ada")
          <p style="font-size: 10pt; margin-bottom: -.10rem;">a. {{$value7[0]}}</p>
          <p style="font-size: 10pt; margin-bottom: -.10rem;">b. -------------------------------------------------------- </p>
        @elseif ($value7[0] != "Tidak ada" && empty($value7[1]) )
          <p style="font-size: 10pt; margin-bottom: -.10rem;">a. {{$value7[0]}}</p>
          <p style="font-size: 10pt; margin-bottom: -.10rem;">b. -------------------------------------------------------- </p>
        @elseif ($value7[0] != "Tidak ada" && !empty($value7[1]) )
          <p style="font-size: 10pt; margin-bottom: -.10rem;">a. {{$value7[0]}}</p>
          <p style="font-size: 10pt; margin-bottom: -.10rem;">b. {{$value7[1]}} </p>
        @endif
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless">
    <tbody>
      <tr>
        <td width="100%" style="padding-top: 1px; margin-top: -.1rem;">
          <p style="margin-bottom: -.45em; margin-left: 23em; margin-right: 0px; font-size: 10pt;">Bogor, {{ Carbon\Carbon::parse($supervisi->tanggal_penjajakan)->translatedFormat('d F Y'); }}</p>
          <p style="margin-bottom: -.10em; margin-left: 23em; margin-right: 0px; font-size: 10pt;">Dosen Penjajakan Lokasi PKL</p>
          <img src="{{public_path($supervisi->getDosen->ttd)}}" style="margin-left: 21em; margin-top: 7px; width: auto; height: 1.5cm;">
          <p style="margin-bottom: -.10em; margin-left: 23em; margin-right: 0px; font-size: 10pt;">{{$supervisi->getDosen->nama}}</p>
          <!-- <p style="margin-bottom: 0em; margin-left: 22.5em; margin-right: 0px; font-size: 10pt;">NPI. {{$supervisi->getDosen->nip}}</p> -->
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
                <td style="padding-top:1px; font-size: 10pt; text-align: center; font-family: Arial, Helvetica, sans-serif;" width="40%">No. Revisi : 0</td>
                <td style="padding-top:1px; font-size: 10pt; text-align: center; font-family: Arial, Helvetica, sans-serif;" width="10%">Hal: 1/2</td>
                <td style="padding-top:1px; font-size: 10pt; text-align: center; font-family: Arial, Helvetica, sans-serif;" width="50%">Tanggal Berlaku: 09 Oktober 2021</td>
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