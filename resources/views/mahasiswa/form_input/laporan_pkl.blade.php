@extends('layouts.mahasiswa')

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11" style="margin: auto;">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="title text-center" style="font-weight: 600;">
                  FILE LAPORAN PKL <br>
                  FORMAT HALAMAN SAMPUL DAN HALAMAN PENGESAHAN LAPORAN PKL
                </div>

                <table class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600; margin: 80px 0px 0px 0px;" width="100%">
                  <thead style="text-align: center;">
                    <tr>
                      <th width="5%">No</th>
                      <th width="35%">Nama File</th>
                      <th width="30%">Format File (.docx)</th>
                      <th width="30%">Contoh File (.pdf)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1 ?>
                    @foreach ($forms as $form)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $form->nama }}</td>
                      <td>
                        <a href="{{ asset($form->file) }}" download="{{$form->nama}}.docx" type="button" class="btn btn-info" style="font-size: 13px;"><i class="fas fa-file-word"></i> {{ $form->nama }}</a> 
                      </td>
                      <td>
                        <a href="{{ asset($form->contoh) }}" download="{{$form->nama}} Contoh.docx" type="button" class="btn btn-success" style="font-size: 13px;"><i class="fas fa-file-pdf"></i> {{ $form->nama }}</a>
                      </td>
                    </tr>
                    <?php $no += 1 ?>
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


  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection