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
                  FORM 009 <br>
                  JURNAL HARIAN PKL
                </div>

                <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                  <tbody>
                    <tr>
                      <td>
                        Silakan isi FORM 009 (Jurnal Harian PKL) pada menu form daily terlebih dahulu. Jika telah diisi dan ditanda tangani oleh pembimbing lapangan, maka upload file form tersebut disini (jadikan satu file berformat file pdf).
                        <br>
                        <small style="color: red;">Pastikan no header dan hal footer tidak salah</small> 
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <input type="file" name="upload" accept=".docx, .pdf" data-allowed-file-extensions='["pdf", "docx"]' id="input-file-now" class="dropify" data-max-file-size="50000K" />
                        <p class="help-block" style="font-size: 12px;">Max Filesize 50 MB (PDF/DOCX)</p>        
                      </td>
                    </tr>
                  </tbody>
                </table>

                <br>
                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: ;"><i class="fas fa-save fa-sm"></i>&nbsp; Kirim</button>

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