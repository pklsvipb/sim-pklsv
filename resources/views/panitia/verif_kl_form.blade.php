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

    <style>
      input[type='radio']:after {
        border: 2px solid green;
      }

      input[type='radio']:checked:after {
        border: 2px solid green;
      }

      #menu-pertama {
        padding: 7px 0px;
        margin-bottom: 10px;
        border-bottom: 2px solid black;
      }

      #menu-pertama a {
        color: black;
        font-weight: 600;
        font-size: 13px;
      }

      #menu-pertama:hover {
        background: #f8f9f9;
      }

      #menu-kedua {
        padding: 7px 0px;
        margin-bottom: 10px;
      }

      #menu-kedua a {
        color: black;
        font-weight: 600;
        font-size: 13px;
      }

      #menu-kedua:hover {
        background: #f8f9f9;
      }
    </style>

    <div class="row">
      <div class="col-md-12">
        <form action="{{route('kolokium-vfs', $id_mhs)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="card">
            <div class="card-body">

              <div class="row">
                <div class="col-md-12">
                  <div class="row text-center">
                    <div class="col-md-6" id="menu-pertama">
                      <a href="{{ route('kolokium-vf', $id_mhs) }}" style="text-decoration: none; padding: 17px 165px;">VERIFIKASI FORM KOLOKIUM</a>
                    </div>
                    <div class="col-md-6" id="menu-kedua">
                      <a href="{{ route('kolokium-vd', $id_mhs) }}" style="text-decoration: none; padding: 17px 160px;">VERIFIKASI DAFTAR KOLOKIUM</a>
                    </div>
                  </div>
                </div>
              </div>
              <br>


              <table class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                <thead>
                  <th>No</th>
                  <th width="25%">Nama</th>
                  <th style="text-align: center;">File</th>
                  <th style="text-align: center;">Status</th>
                  <th style="text-align: center;">Keterangan</th>
                  <th style="text-align: center;">Aksi</th>
                </thead>
                <tbody>
                  <?php $no = 1;
                  $id = 0; ?>
                  @foreach ($forms as $form)
                  <tr>
                    <td>{{ $no }}</td>

                    <td>{{ $form->nama }}</td>

                    @if($file[$id][3] == "")
                    <td style="text-align: center;"></td>
                    @else
                    <td style="text-align: center;"><a href="{{ asset($file[$id][3]) }}"><span style="color: red;"><i class="fas fa-file-pdf fa-lg"></i></span></a></td>
                    <input type="hidden" name="id_form[]" value="{{$file[$id][4]}}">
                    @endif

                    <td style="text-align: center;">
                      @if($file[$id][0] == 1)
                      <!--  set verif -->
                      <a type="button" class="btn btn-sm btn-success" style="font-size: 11px;" disabled>Disetujui</a>
                      @else
                      @if($file[$id][1] == 1)
                      <!--  set failed -->
                      <a type="button" class="btn btn-sm btn-danger" style="font-size: 11px;" disabled>Ditolak</a>
                      @else
                      @if($file[$id][2] != "")
                      <a type="button" class="btn btn-sm btn-secondary" style="font-size: 11px;" disabled>Cek Perbaikan</a>
                      @else
                      <span></span>
                      @endif
                      @endif
                      @endif
                    </td>

                    <td>
                      @if($file[$id][3] == "")
                      <span></span>
                      @else
                      <textarea class="form-control form-control-sm" id="alamat" name="komen{{$file[$id][4]}}" rows="2" placeholder="Masukan Komentar">{{ $file[$id][2] }}</textarea>
                      @endif
                    </td>

                    <td>
                      @if($file[$id][0] == 1)
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="verif{{$file[$id][4]}}" value="1" checked>
                          <label class="form-check-label">Diterima</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="verif{{$file[$id][4]}}" value="0">
                          <label class="form-check-label">Ditolak</label>
                        </div>
                      @elseif($file[$id][0] == 0)
                          @if($file[$id][1] == 0 && $file[$id][3] == "")
                          <span></span>
                          @elseif($file[$id][1] == 0 && $file[$id][3] != "")
                            @if ($form->id == 3)
                              <div class="form-check">
                              <input class="form-check-input" type="radio" name="verif{{$file[$id][4]}}" value="1">
                              <label class="form-check-label">Diterima</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="verif{{$file[$id][4]}}" style="display: none;" value="2" checked>
                              </div>
                            @else
                              <div class="form-check">
                              <input class="form-check-input" type="radio" name="verif{{$file[$id][4]}}" value="1">
                              <label class="form-check-label">Diterima</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="verif{{$file[$id][4]}}" value="0">
                                <label class="form-check-label">Ditolak</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="verif{{$file[$id][4]}}" style="display: none;" value="2" checked>
                              </div>
                            @endif
                          @else
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="verif{{$file[$id][4]}}" value="1">
                            <label class="form-check-label">Diterima</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="verif{{$file[$id][4]}}" value="0" checked>
                            <label class="form-check-label">Ditolak</label>
                          </div>
                          @endif
                      @endif
                    </td>

                  </tr>
                  <?php $no += 1;
                  $id += 1; ?>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- ./card-body -->
          </div>
          <!-- /.card -->

          <button type="submit" class="btn btn-success btn-sm" style="width: 100%; text-align: center;"> Simpan </button>
        </form>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection