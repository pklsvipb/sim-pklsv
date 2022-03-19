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
        <form action="{{url('/panitia/set-kaprodi/submit')}}" method="POST">
        {{ csrf_field() }}
          <div class="form-group row">
            <div class="col-sm-5">
              <select class="form-control select2" name="kaprodi" required>
                <option selected="selected" disabled>Select Kaprodi {{$kaprodi->nama}}</option>
                @foreach($dosen as $dsn)
                  @if ($kaprodi == null) 
                    <option value="{{$dsn->id}}">{{$dsn->nip}} - {{$dsn->nama}}</option>
                  @elseif($dsn->id == $kaprodi->id_kaprodi)
                    <option selected value="{{$dsn->id}}">{{$dsn->nip}} - {{$dsn->nama}}</option>
                  @else
                  <option value="{{$dsn->id}}">{{$dsn->nip}} - {{$dsn->nama}}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="col-sm-2">
              <button type="submit" class="btn btn-success btn-sm mt-1"><i class="fa fa-save fa-sm"></i> Simpan</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" style="font-size: 12px; color: #333; clear: both;">
              <div class="row">
                <div class="col-md-12">
                  <div class="row text-center">
                  </div>
                  <div class="text-center">
                    <p class="badge badge-primary p-2" style="font-size: 13px;">KARTU KENDALI PEMBIMBINGAN LAPORAN AKHIR MAHASISWA</p>
                  </div>
                  <table id="datatable1" class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline collapsed" style="font-size: 12px; font-weight: 400; color: black; width: 100%;" width="100%" role="grid" aria-describedby="data-table_info">
                    <thead>
                      <th width="5%" style="text-align: center;">No</th>
                      <th width="40%">Nama</th>
                      <th width="10%">NIM</th>
                      <th width="10%" style="text-align: center;">Detail</th>
                      <th width="10%" style="text-align: center;">File Upload</th>
                    </thead>
                    <tbody>
                      <?php $no = 1; ?>
                      @foreach ($getmhs as $data)
                        <tr>
                          <td style="text-align: center;">{{ $no }}</td>
                          <td>{{ $data->getMahasiswa->nama }}</td>
                          <td>{{ $data->getMahasiswa->nim }}</td>
                          <td style="text-align: center;">
                            <a data-toggle="modal" class="btn btn-success btn-sm" data-target="#Status-{{$data->id_mhs}}" title="Status Mahasiswa" type="button"><i class="fas fa-search"></i> Detail</a>
                          </td>
                          <td style="text-align: center;">
                              @if (File::exists(public_path('pdf/'.$data->getMahasiswa->nim.'/pdf_kartu_bimbingan.pdf')))
                              <a href="{{ asset('pdf/'.$data->getMahasiswa->nim.'/pdf_kartu_bimbingan.pdf') }}" class="btn btn-danger btn-sm" download="Kartu_Bimbingan_{{$data->getMahasiswa->nama}}_{{$data->getMahasiswa->nim}}.pdf" style="text-decoration: none; text-align:center;"><i class="fas fa-file-pdf fa-sm"></i> PDF</a>
                              @else
                              (empty)
                              @endif
                          </td>
                        </tr>
                        <?php $no += 1; ?>
                      @endforeach
                    </tbody>
                  </table>
                  </form>
                </div>
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
@include('modal.kartu-bimbingan')
@endforeach
@endif

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

<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>
@endpush