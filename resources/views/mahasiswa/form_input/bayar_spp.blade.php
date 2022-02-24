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
                  BUKTI PEMBAYARAN SPP <br>
                </div>

                  <table cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600; margin: 50px 0px; text-align:center" width="100%">
                    <tbody>
                      <tr>
                        <td width="100%">
                          Upload file bukti pembayaran spp pada link berikut ini:
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <br>
                          @if ($link->bayar_spp == null)
                          <a type="button" class="btn btn-info" onclick="alert('Belum ada link')">Link Drive</a>
                          @else
                          <a type="button" class="btn btn-info" href="{{$link->bayar_spp}}" target="_blank">Link Drive</a>      
                          @endif
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