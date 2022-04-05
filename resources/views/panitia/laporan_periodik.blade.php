@extends('layouts.panitia')

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
                <div class="row text-center">
                </div>
                <div class="text-center">
                  <p class="badge badge-primary p-2">LAPORAN PERIODIK MAHASISWA</p>
                </div>
                <table class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                  <thead>
                    <th width="5%">No</th>
                    <th width="30%">Nama</th>
                    <th width="10%">NIM</th>
                    <th width="10%" style="text-align: center;">Aksi</th>
                    <th width="10%" style="text-align: center;">File Upload</th>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    $id = 0; ?>
                    @foreach ($getmhs as $data)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $data->getMahasiswa->nama }}</td>
                      <td>{{ $data->getMahasiswa->nim }}</td>
                      <td style="text-align: center;"><a data-toggle="modal" class="btn btn-success btn-sm" data-target="#Status-{{$data->id_mhs}}" title="Status Mahasiswa" type="button"><i class="fas fa-search"></i> Detail</a></td>
                      <td style="text-align: center;">
                        @if (File::exists(public_path('pdf/'.$data->getMahasiswa->nim.'/pdf_laporan_periodik.pdf')))
                          <a href="{{ asset('pdf/'.$data->getMahasiswa->nim.'/pdf_laporan_periodik.pdf') }}" class="btn btn-danger btn-sm" download="Jurnal_Harian_{{$data->getMahasiswa->nama}}_{{$data->getMahasiswa->nim}}.pdf" style="text-decoration: none; text-align:center;"><i class="fas fa-file-pdf fa-sm"></i> PDF</a>
                        @else
                          (empty)
                        @endif
                      </td>
                    </tr>
                    <?php $no += 1;
                    $id += 1; ?>
                    @endforeach
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
@if(is_null($getmhs) == 0)
@foreach($getmhs as $data)
@include('modal.laporan-periodik')
@endforeach
@endif

@endsection

