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
                  FORM 027 <br>
                  PERSETUJUAN PERBAIKAN UJIAN TUGAS AKHIR
                </div>

                  @foreach ($datas as $data)

                  @if ($form027 != null)
                    @if ($form027->ttd_dospem == 1 && $form027->ttd_dosji == 1)
                    <form action="{{ url('/mahasiswa/form027/delete', $id) }}" method="POST" class="form-horizontal">
                    @csrf
                      <a type="button" class="btn btn-danger" href="{{ asset($form027->file) }}" style="font-size: 13px; margin: 50px 0px 10px 0px;"><i class="fas fa-file-pdf"></i> Form 027 Persetujuan Perbaikan Ujian Tugas Akhir</a>
                      <button type="submit" class="btn btn-danger" style="font-size: 13px; margin: 50px 0px 10px 0px;" onclick="return confirm('Yakin ingin menghapus form 027?')"><i class="fa fa-trash"></i></button>
                    </form>

                    <table cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;" width="100%">
                      <tbody>
                        <tr>
                          <td width="100%">
                            Form 027 Belum Ditanda Tangani Oleh Dosen Penguji
                          </td>
                        </tr>
                      </tbody>
                    </table>  
                    
                    @elseif ($form027->ttd_dospem == 1 && $form027->ttd_dosji == 0)
                    <form action="{{ url('/mahasiswa/form027/delete', $id) }}" method="POST" class="form-horizontal">
                    @csrf
                      <a type="button" class="btn btn-danger" href="{{ asset($form027->file) }}" style="font-size: 13px; margin: 50px 0px 10px 0px;"><i class="fas fa-file-pdf"></i> Form 027 Persetujuan Perbaikan Ujian Tugas Akhir</a>
                      <button type="submit" class="btn btn-danger" style="font-size: 13px; margin: 50px 0px 10px 0px;" onclick="return confirm('Yakin ingin menghapus form 027?')"><i class="fa fa-trash"></i></button>
                    </form>

                    <table cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;" width="100%">
                      <tbody>
                        <tr>
                          <td width="100%">
                            Form 027 Belum Ditanda Tangani Oleh Dosen Pembimbing
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    @elseif ($form027->set_failed == 1)
                    <form action="{{ url('/mahasiswa/form027/delete', $id) }}" method="POST" class="form-horizontal">
                      @csrf
                        <a type="button" class="btn btn-danger" href="{{ asset($form027->file) }}" style="font-size: 13px; margin: 50px 0px 10px 0px;"><i class="fas fa-file-pdf"></i> Form 027 Persetujuan Perbaikan Ujian Tugas Akhir</a>
                        <button type="submit" class="btn btn-danger" style="font-size: 13px; margin: 50px 0px 10px 0px;" onclick="return confirm('Yakin ingin menghapus form 027?')"><i class="fa fa-trash"></i></button>
                      </form>
    
                      <table cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;" width="100%">
                        <tbody>
                          <tr>
                            <td width="100%">
                              Verifikasi form 027 ditolak oleh panitia, silahkan hapus dan isi kembali
                            </td>
                          </tr>
                        </tbody>
                      </table>   
                    @endif
                
                  @else
                   @if ($cek != null)
                    <form action="{{ route('form027-pdf', $id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                          <tbody>
                            <tr>
                              <td width="20%">Nama Mahasiswa</td>
                              <td>:</td>
                              <td width="80%"><input type="text" value="{{$data->nama}}" class="form-control" disabled></td>
                            </tr>
                            <tr>
                              <td>NIM</td>
                              <td>:</td>
                              <td><input type="text" value="{{$data->nim}}" class="form-control" disabled></td>
                            </tr>
                          </tbody>
                        </table>
                        <table class="table table-bordered" id="penguji">
                          <tbody>
                            <tr>
                              <th style="font-size: 13px; padding: 5px; text-align: center;  background: #FFC107;">Koreksi/Saran Dosen Penguji</th>
                              <th style="font-size: 13px; padding: 5px; text-align: center;  background: #FFC107;">Perbaikan</th>
                              <th style="font-size: 13px; padding: 5px; text-align: center;  background: #FFC107;">Aksi</th>
                            </tr>
                            <tr>
                              <td><textarea class="form-control" name="koreksi_penguji[]" id="" cols="30" rows="4" required></textarea></td>
                              <td><textarea class="form-control" name="perbaikan_penguji[]" id="" cols="30" rows="4" required></textarea></td>
                              <td style="text-align: center; vertical-align: middle;"><a type="button" id="add" class="btn btn-primary btn-sm mt-1"><i class="fas fa-plus"></i></a></td>
                            </tr>
                          </tbody>
                        </table>

                        <br><br><br>

                        <table class="table table-bordered" id="pembimbing">
                          <tbody>
                            <tr>
                              <th style="font-size: 13px; padding: 5px; text-align: center; background: #FFC107;">Koreksi/Saran Dosen Pembimbing</th>
                              <th style="font-size: 13px; padding: 5px; text-align: center; background: #FFC107;">Perbaikan</th>
                              <th style="font-size: 13px; padding: 5px; text-align: center; background: #FFC107;">Aksi</th>
                            </tr>
                            <tr>
                              <td><textarea class="form-control" name="koreksi_pembimbing[]" id="" cols="30" rows="4" required></textarea></td>
                              <td><textarea class="form-control" name="perbaikan_pembimbing[]" id="" cols="30" rows="4" required></textarea></td>
                              <td style="text-align: center; vertical-align: middle;"><a type="button" id="add2" class="btn btn-primary btn-sm mt-1"><i class="fas fa-plus"></i></a></td>
                            </tr>
                          </tbody>
                        </table>

                        <br>
                        <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-save fa-sm"></i>&nbsp; Kirim</button>
                      </form>
                    @else
                      <br><br><br>
                      <div class="content text-center">
                        <a class="btn" style="font-weight: 600; font-size: 14px; cursor: auto; background: #FFC107">Lakukan Sidang Terlebih Dahulu</a>
                      </div>
                    @endif
                  @endif

                  @endforeach

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

@push('scripts')
<script>
  $(document).ready(function() {

    var i = 1;
    $('#add').click(function() {
      i++;
      $('#penguji').append('<tr id="group' + i + '"><td><textarea class="form-control" name="koreksi_penguji[]" id="" cols="30" rows="4" required></textarea></td><td><textarea class="form-control" name="perbaikan_penguji[]" id="" cols="30" rows="4" required></textarea></td><td style="text-align: center; vertical-align: middle;"><a type="button" id="' + i + '" class="btn btn-danger btn-sm mt-1"><i class="fas fa-times"></i></a></td></tr>');
    });

    $(document).on('click', '.btn', function() {
      var button_id = $(this).attr("id");
      $('#group' + button_id + '').remove();
    });

  });


  $(document).ready(function() {

    var i = 1;
    $('#add2').click(function() {
      i++;
      $('#pembimbing').append('<tr id="groupget' + i + '"><td><textarea class="form-control" name="koreksi_pembimbing[]" id="" cols="30" rows="4" required></textarea></td><td><textarea class="form-control" name="perbaikan_pembimbing[]" id="" cols="30" rows="4" required></textarea></td><td style="text-align: center; vertical-align: middle;"><a type="button" id="get' + i + '" class="btn btn-danger btn-sm mt-1"><i class="fas fa-times"></i></a></td></tr>');
    });

    $(document).on('click', '.btn', function() {
      var button_id = $(this).attr("id");
      $('#group' + button_id + '').remove();
    });

  });
</script>
@endpush