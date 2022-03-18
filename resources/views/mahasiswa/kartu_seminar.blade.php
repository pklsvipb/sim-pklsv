@extends('layouts.mahasiswa')

@section('user')
<div class="info">
  <a href="#" class="d-block">
    @foreach($datas as $data)
    <span> {{$data->nama}}</span>
    &nbsp;
    @endforeach

    <p style="font-size: 11px;">Mahasiswa</p>
  </a>
</div>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    @if ($message = Session::get('success'))
    <div id="messageAlert" class="alert alert-success alert-dismissible">
      <i class="fa fa-check"></i> &nbsp; {{ $message }}
    </div>
    @endif

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div style="font-size: 18px; font-weight: 600; margin: 20px 0px 40px 0px; text-align:center;">
                  @if ($jumlah < 20)
                    <a onclick="alert('Selesaikan minimal 20 list pada kartu seminar yang sudah di tanda tangani moderator')" type="button" class="btn btn-secondary" style="font-size: 12px; float: right; margin-top: -20px;"><i class="fa fa-download fa-sm"></i>&nbsp;Download Kartu Seminar</a> 
                  @else
                    <a href="{{route('download-kartu-sm')}}" type="button" class="btn btn-info" style="font-size: 12px; float: right; margin-top: -20px;"><i class="fa fa-download fa-sm"></i>&nbsp;Download Kartu Seminar</a> 
                  @endif
                  <br>

                  FORM 017 <br>
                  KARTU SEMINAR      
                </div>
                
                <table id="datatable1" class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                  <thead>
                    <tr>
                      <th width="20%" style="text-align: center">Hari/Tanggal</th>
                      <th width="5%" style="text-align: center">Waktu</th>
                      <th width="20%" style="text-align: center">Nama Pemrasaran</th>
                      <th width="10%" style="text-align: center">NIM</th>
                      <th width="30%" style="text-align: center">Moderator</th>
                      <th width="10%" style="text-align: center">Paraf</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    @foreach ($seminars as $sm)
                    <tr>
                      <td>{{ Carbon\Carbon::parse($sm->tanggal)->translatedFormat('l/ d F Y'); }}</td>
                      <td>{{ date('H:i', strtotime($sm->waktu)) }}</td>
                      <td>{{ $sm->nama_pemrasaran }}</td>
                      <td>{{ $sm->nim_pemrasaran }}</td>
                      <td>{{ $sm->getDosen->nama }}</td>
                      <td>
                        @if ($sm->paraf == 0)
                          <span class='badge badge-danger'>Belum diverif</span>
                        @else
                          <span class='badge badge-success'>Sudah ditanda tangan</span>
                        @endif
                      </td>
                    </tr>
                    <?php $i += 1; ?>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- ./card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->

@endsection

@push('scripts')
<script>
  $(function() {
    $("#datatable1").DataTable({
      "responsive": true,
      "lengthChange": true,
      "aLengthMenu": [
        [5, 25, 50, 75, -1],
        [5, 25, 50, 75, "All"]
      ],
      "pageLength": 5,
      "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush
