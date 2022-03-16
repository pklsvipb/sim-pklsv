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
                  PERSYARATAN SEMINAR <br>
                </div>

                  <table cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600; margin: 50px 0px; text-align:center" width="100%">
                    <tbody>
                      <tr>
                        <td width="100%">
                          Upload softcopy makalah seminar, file presentasi dan produk pada link berikut ini:
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <br>
                          @if ($link->syarat_seminar == null)
                          <a type="button" class="btn btn-info" onclick="alert('Belum ada link')">Link Drive</a>
                          @else
                          <a type="button" class="btn btn-info" href="{{$link->syarat_seminar}}" target="_blank">Link Drive</a>      
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