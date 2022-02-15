@extends('layouts.dosen')

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
          <div class="card-header">
            <!-- <h5 class="card-title">Profile</h5> -->
            <h1 class="card-title" style="font-weight: 600; font-size: 1.2rem;">Form 003 <small style="font-size: 12px; color: #777;">Kesediaan Pembimbing > Insert</small></h1>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                @if (File::exists(public_path('file_form/kesediaan_dosen/'.$user->id_user.'/pdf_form_003.pdf')))
                <div style="text-align: center; margin: 15% 0%;">
                  <p style="font-size: 17px; font-weight: 600;">Download Form 003 Kesediaan Dosen Pembimbing</p>
                  <a type="button" class="btn btn-danger" href="{{ asset('file_form/kesediaan_dosen/'.$user->id_user.'/pdf_form_003.pdf') }}" style="font-size: 13px;"><i class="fas fa-file-pdf"></i> Kesediaan Dosen Pembimbing</a>
                </div>
                @else
                <form action="{{ route('form003-pdf') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kesediaan <i style="color: red">*</i></label>
                    <div class="col-sm-6">
                      <span class="badge badge-success">Bersedia</span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Program Studi <i style="color: red">*</i></label>
                    <div class="col-sm-6">
                      <select class="form-control select2 select2-hidden-accessible" name="prodi" style="width: 100%;" required>
                        <option selected="selected" value="" disabled>...</option>
                        <option>Manajemen Informatika</option>
                        <option>Teknik Komputer</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Peminatan 1<i style="color: red">*</i></label>
                    <div class="col-sm-6">
                      <select class="form-control select2 select2-hidden-accessible" name="peminatan1" style="width: 100%;" required>
                        <option selected="selected" value="" disabled>...</option>
                        <option>Sistem Informasi</option>
                        <option>Multimedia</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Peminatan 2<span style="color: red"> (Opsional)</span></label>
                    <div class="col-sm-6">
                      <select class="form-control select2 select2-hidden-accessible" name="peminatan2" style="width: 100%;">
                        <option selected="selected" value="" disabled>...</option>
                        <option>Sistem Informasi</option>
                        <option>Multimedia</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Usulan Berkenaan Praktik Kerja Lapangan <span style="color: red"> (Opsional)</span></label>
                    <div class="col-sm-6">
                      <textarea name="usulan" rows="2" class="form-control"></textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal <i style="color: red">*</i></label>
                    <div class="col-sm-6">
                      <input type="date" name="tanggal" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-3 col-form-label"></div>
                    <div class="col-sm-6 mt-4">
                      <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save fa-sm"></i>&nbsp; Simpan</button>
                    </div>
                  </div>

                </form>
                @endif
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
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
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>
@endpush