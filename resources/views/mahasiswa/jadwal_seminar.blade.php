@extends('layouts.mahasiswa')

@section('user')
<div class="info">
  <a href="#" class="d-block">
    @foreach($datas as $data)
    <span> {{$data->nama}}</span>
    &nbsp;
    @endforeach

    <p style="font-size: 11px; ">Mahasiswa</p>
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
    @elseif ($message = Session::get('error'))
    <div id="messageAlert" class="alert alert-danger alert-dismissible">
      <i class="fa fa-times"></i> &nbsp; {{ $message }}
    </div>
    @endif

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <small style="color: red;">* Pendaftaran dibuka H-1 jadwal seminar dan tidak bisa mendaftar lebih dari satu seminar di waktu yang bersamaan</small><br><br>
                <a href="{{route('kartu-sm')}}" title="set-kelompok" class="btn btn-info btn-sm" style="float: right; margin-top: -50px;"><i class="fa fa-book fa-sm"></i>&nbsp;Lihat Kartu Seminar</a></li>
                <p style="font-size: 20px; font-weight: 600; text-align: center;">
                  JADWAL SEMINAR 
                </p>
                <table id="datatable1" class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                  <thead style="text-align: center;">
                    <th width="5%">No</th>
                    <th width="5%">Hadir</th>
                    <th width="10%">Tanggal</th>
                    <th width="20%">Nama Pemrasan</th>
                    <th width="10%">Nim Pemrasan</th>
                    <th width="5%">Judul</th>
                    <th width="5%">Jumlah Forum</th>
                    <th width="20%">Dosen Pembimbing</th>
                    <th width="20%">Moderator</th>
                  </thead>
                  <tbody>
                    @for($i=0; $i < count($jadwal); $i++) 
                    <tr>
                      <td>{{$i + 1}}</td>
                      <td>

                        <?php 
                          $tgl = $jadwal[$i][1] . ' ' . $jadwal[$i][2];
                          $date = Carbon\Carbon::parse($tgl);
                          $now = Carbon\Carbon::now();
                          $past = $date->lessThan($now);
                        ?>

                        @if ($date->lessThan($now))
                        <button type="button" class="btn btn-secondary btn-sm" onclick="return alert('pendaftaran seminar sudah ditutup')"><i class="fas fa fa-check"></i></button>
                        @else
                        <form action="{{ route('hadir-seminar', $jadwal[$i][0]) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin menghadiri seminar ini?')"><i class="fas fa fa-check"></i></button>
                        </form>
                        @endif

                      </td>
                      <td>{{ date('d-m-Y', strtotime($jadwal[$i][1])) }} {{ date('H:i', strtotime($jadwal[$i][2])) }}</td>
                      <td>{{ $jadwal[$i][3] }}</td>
                      <td>{{ $jadwal[$i][4] }}</td>
                      <td style="text-align: center;">
                        <a type="button" class="btn btn-info btn-icon btn-sm" data-toggle="modal" style="font-size: 11px;" data-target="#Judul-{{$jadwal[$i][0]}}" title="Judul"><i class="fas fa fa-book"></i></a>
                        @include('modal.judul-sm')
                      </td>
                      <td>{{ $jadwal[$i][7] }}</td>
                      <td>{{ $jadwal[$i][5] }}</td>
                      <td>{{ $jadwal[$i][6] }}</td>
                    </tr>
                    @endfor
                  </tbody>
                </table>
                </form>
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

{{-- @if(is_null($seminars) == 0)
@foreach($seminars as $sm)
@include('modal.judul-sm')
@endforeach
@endif --}}

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
