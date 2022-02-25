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
                  FORM 015 <br>
                  PENILAIAN PERUSAHAAN / INSTANSI TERHADAP MAHASISWA PKL
                </div>
                <table cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600; margin: 50px 0px; text-align:center" width="100%">
                  <tbody>
                    <tr>
                      <td width="100%">
                        Silakan unduh format FORM 015 (Penilaian Perusahaan / Instansi Terhadap Mahasiswa PKL) terlebih dahulu. Jika telah diisi dan ditanda tangani oleh instansi, maka upload file form tersebut di link berikut (format file pdf). 
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <br>
                        <a type="button" class="btn btn-info" href="{{$link->link_form015}}" target="_blank">Link Drive</a>
                      </td>
                    </tr>
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