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
                  FORM 014 <br>
                  PENILAIAN PEMBIMBING LAPANGAN PKL
                </div>

                <form action="{{ route('form014-pdf', $id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                    <tbody>
                      <tr>
                        <td>
                          <a href="{{route('form014-pdf-download')}}" type="button" class="btn btn-info" style="font-size: 13px;"><i class="fas fa-file-pdf"></i> Form 014 Penilaian Pembimbing Lapangan PKL</a> 
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Silakan unduh FORM 014 (Penilaian Pembimbing Lapangan PKL) terlebih dahulu. Jika telah diisi dan ditanda tangani oleh instansi, maka upload file form tersebut disini (format file pdf).
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <input type="file" name="upload" accept=".docx, .pdf" data-allowed-file-extensions='["pdf", "docx"]' id="input-file-now" class="dropify" data-max-file-size="3000K" />
                          <p class="help-block" style="font-size: 12px;">Max Filesize 3 MB (PDF)</p>        
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <br>
                  <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: ;"><i class="fas fa-save fa-sm"></i>&nbsp; Kirim</button>

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


  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection