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
                <p class="badge badge-primary p-2">JURNAL HARIAN MAHASISWA</p>
                </div>
                <table class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                  <thead>
                    <th>No</th>
                    <th width="30%">Nama</th>
                    <th>NIM</th>
                    <th width="10%">Aksi</th>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    $id = 0; ?>
                    @foreach ($getmhs as $data)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $data->getMahasiswa->nama }}</td>
                      <td>{{ $data->getMahasiswa->nim }}</td>
                      <td><a data-toggle="modal" class="btn btn-success btn-sm" data-target="#Status-{{$data->id_mhs}}" title="Status Mahasiswa" type="button"><i class="fas fa-search"></i> Detail</a></td>
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
@include('modal.jurnal-status')
@endforeach
@endif

@endsection
