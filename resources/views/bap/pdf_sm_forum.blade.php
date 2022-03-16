<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css_pdf/bootstrap.min.css')}}">


  <title>Form Penilaian Forum Seminar PDF</title>
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
      margin-top: 3.5cm;
      margin-left: 2cm;
      margin-right: 2cm;
      margin-bottom: 0.2cm;
    }
  </style>
</head>

<body>
  <table class="table table-borderless">
    <tbody>
      <tr>
        <td style="text-align: center;">
          <p style="margin-bottom: -7px; font-size: 14pt; letter-spacing: -1px;"><b>FORM PENILAIAN FORUM</b></p>
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: -1em;">
    <tbody>
      <tr>
        <td width="7%">
          <p style="margin-bottom: 0em; letter-spacing: -1px; font-weight: 600; font-size: 10pt;">HARI</p>
          <P style="margin-bottom: 0em; letter-spacing: -1px; font-weight: 600; font-size: 10pt;">TANGGAL</P>
        </td>
        <td width="1%">
          <p style="margin-bottom: 0em; font-weight: 600; font-size: 10pt;">:</p>
          <p style="margin-bottom: 0em; font-weight: 600; font-size: 10pt;">:</p>
        </td>
        <td width="25%">
          <p style="margin-bottom: 0em; font-weight: 600; margin-left: -1em; font-size: 10pt;">{{ Carbon\Carbon::parse($sm->tgl)->translatedFormat('l'); }}</p>
          <p style="margin-bottom: 0em; font-weight: 600; margin-left: -1em; font-size: 10pt;">{{ Carbon\Carbon::parse($sm->tgl)->translatedFormat('d F Y'); }}</p>
        </td>
        <td width="23%">
          <p style="margin-bottom: 0em; letter-spacing: -1px; font-weight: 600; font-size: 10pt;">NAMA PEMRASARAN</p>
          <P style="margin-bottom: 0em; letter-spacing: -1px; font-weight: 600; font-size: 10pt;">NIM</P>
        </td>
        <td width="1%">
          <p style="margin-bottom: 0em; font-weight: 600; font-size: 10pt;">:</p>
          <p style="margin-bottom: 0em; font-weight: 600; font-size: 10pt;">:</p>
        </td>
        <td width="43%">
          <p style="margin-bottom: 0em; font-weight: 600; margin-left: -1em; font-size: 10pt;">{{ $mhs->nama }}</p>
          <p style="margin-bottom: 0em; font-weight: 600; margin-left: -1em; font-size: 10pt;">{{ $mhs->nim }}</p>
        </td>
      </tr>
    </tbody>
  </table>


  <table class="table table-borderless" style="margin-top: 1em;">
    <tbody>
      <tr>
        <td>
          <table class="table table-bordered" id="nilai" style="margin-top: -1em;">
            <thead>
              <tr>
                <th style="font-size: 11pt; font-weight: 600; text-align: center; vertical-align: middle;" width="7%">NO</th>
                <th style="font-size: 11pt; font-weight: 600; text-align: center; vertical-align: middle;" width="36%">NAMA</th>
                <th style="font-size: 11pt; font-weight: 600; text-align: center; vertical-align: middle;" width="15%">NIM</th>
                <th style="font-size: 11pt; font-weight: 600; text-align: center;" width="15%">NILAI</th>
                <th style="font-size: 11pt; font-weight: 600; text-align: center;" width="30%">KETERANGAN</th>
              </tr>
            </thead>
            @if (count($datas) != 0)
              @if (count($datas) < 5)
                <tbody>
                  <?php $no = 1; ?>
                  @foreach ($datas as $data)
                  <tr>
                    <td style="font-size: 11pt; text-align: center;">{{ $no }}</td>
                    <td style="font-size: 11pt; text-align: left;">{{ $data->getMhs->nama }}</td>
                    <td style="font-size: 11pt; text-align: center;">{{ $data->getMhs->nim }}</td>
                    <td style="font-size: 11pt; text-align: center;">{{ $data->nilai }}</td>
                    <td style="font-size: 11pt; text-align: center;">{{ $data->keterangan }}</td>
                  </tr>
                  <?php $no += 1; ?>
                  @endforeach
                  <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>

              @elseif (count($datas) < 10)
                <tbody>
                  <?php $no = 1; ?>
                  @foreach ($datas as $data)
                  <tr>
                    <td style="font-size: 11pt; text-align: center;">{{ $no }}</td>
                    <td style="font-size: 11pt; text-align: left;">{{ $data->getMhs->nama }}</td>
                    <td style="font-size: 11pt; text-align: center;">{{ $data->getMhs->nim }}</td>
                    <td style="font-size: 11pt; text-align: center;">{{ $data->nilai }}</td>
                    <td style="font-size: 11pt; text-align: center;">{{ $data->keterangan }}</td>
                  </tr>
                  <?php $no += 1; ?>
                  @endforeach
                  <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>

              @else
                <tbody>
                  <?php $no = 1; ?>
                  @foreach ($datas as $data)
                  <tr>
                    <td style="font-size: 11pt; text-align: center;">{{ $no }}</td>
                    <td style="font-size: 11pt; text-align: left;">{{ $data->getMhs->nama }}</td>
                    <td style="font-size: 11pt; text-align: center;">{{ $data->getMhs->nim }}</td>
                    <td style="font-size: 11pt; text-align: center;">{{ $data->nilai }}</td>
                    <td style="font-size: 11pt; text-align: center;">{{ $data->keterangan }}</td>
                  </tr>
                  <?php $no += 1; ?>
                  @endforeach
                </tbody>

              @endif
        
            @else
            <tbody>
              <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
            @endif
          </table>
        </td>
      </tr>
    </tbody>
  </table>

  <table class="table table-borderless" style="margin-top: -1em;">
    <tbody>
      <tr>
        <td width="100%">
          <p style="margin-bottom: 0em; margin-left: 25.5em; margin-right: 0px; font-size: 11pt;">Moderator, {{ Carbon\Carbon::parse($bap->tgl)->translatedFormat('d F Y'); }}</p>
          <img src="{{url($dosen->ttd)}}" style="margin-left: 24em; margin-top: 7px; width: auto; height: 2cm;">
          <p style="margin-bottom: 0em; margin-left: 25.5em; margin-right: 0px; font-size: 11pt;">{{$dosen->nama}}</p>
          <br><br><br>
        </td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>

  <script src="{{asset('css_pdf/jquery-3.2.1.slim.min.js')}}"></script>
  <script src="{{asset('css_pdf/popper.min.js')}}"></script>
  <script src="{{asset('css_pdf/bootstrap.min.js')}}"></script>
</body>

</html>