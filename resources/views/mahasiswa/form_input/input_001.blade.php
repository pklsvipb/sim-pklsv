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
                  FORM 001 <br>
                  USULAN MINAT BIDANG KAJIAN DAN LOKASI PKL
                </div>

                <form action="{{ route('form001-pdf', $id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  @foreach ($datas as $data)
                  <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                    <tbody>
                      <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{$data->nama}}</td>
                      </tr>
                      <tr>
                        <td>NIM </td>
                        <td>:</td>
                        <td>{{$data->nim}}</td>
                      </tr>
                    </tbody>
                  </table>

                  <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                    <tbody>
                      <tr>
                        <td colspan="2">Usulan Minat Bidang dan Kajian</td>
                      </tr>
                      <tr>
                        <td>1. </td>
                        <td>
                        @if ($data->id_prodi == 1)
                          <select name="kajian" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required>
                            <option value="" selected disabled>Pilih Bidang Kajian</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Multimedia">Multimedia</option>
                          </select>
                        @elseif ($data->id_prodi == 2)
                            <select name="kajian" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required>
                            <option value="" selected disabled>Pilih Bidang Kajian</option>
                            <option value="Jaringan">Jaringan</option>
                            <option value="Hardware">Hardware</option>
                          </select>
                        @endif
                        </td>
                      </tr>
                    </tbody>
                  </table>

                  <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                    <tbody>
                      <tr>
                        <td colspan="3">Usulan Lokasi PKL</td>
                      </tr>
                      <tr>
                        <td width="35%">&nbsp;&nbsp;&nbsp; Nama Perusahaan/Instansi</td>
                        <td>:</td>
                        <td width="65%"><input type="text" name="instansi" value="{{$data->instansi}}" class="form-control"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp; Alamat Lengkap</td>
                        <td>:</td>
                        <td><textarea name="alamat" rows="2" class="form-control">{{$data->alamat_instansi}}</textarea></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp; Nama Pimpinan Perusahaan/ Instansi</td>
                        <td>:</td>
                        <td><input type="text" name="pimpinan" class="form-control"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp; Contact Person/Telepon/HP/E-mail</td>
                        <td>:</td>
                        <td><input type="text" name="contact" class="form-control"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp; Lampiran Profil Perusahaan/Instansi
                          <br>
                          &nbsp;&nbsp;&nbsp; (jadikan menjadi satu file pdf)
                        </td>
                        <td>:</td>
                        <td>
                          <input type="file" name="upload" accept=".docx, .pdf" data-allowed-file-extensions='["pdf"]' id="input-file-now" class="dropify" data-max-file-size="3000K" required/>
                          <p class="help-block" style="font-size: 12px;">Max Filesize 3 MB (PDF/DOCX)</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4 mt-5">
                      <label style="font-size: 14px;">Tanggal</label>
                      <input type="date" class="form-control" name="tgl" style="border: none; border-bottom: 1px solid black; border-radius: 0px;">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-8 mt-5"></div>
                    <div class="col-md-4" style="text-align: center;">
                      <br>
                      @if ($data->ttd != null)
                      <img id="preview" src="{{ asset($data->ttd)}}" style="width: auto; height: 2.5cm;">
                      @else
                      <small style="color: red;"> Tanda tangan belum ada, silakan isi biodata terlebih dahulu </small>
                      @endif
                      <div>
                        <p style="padding-top:10px; margin-bottom:-2px; font-weight: 600; font-size: 14px; text-align: center;">({{$data->nama}})</p>
                        <p style="font-weight: 600; font-size: 14px; padding-top: 10px;"><input type="hidden" name="telp" value="{{$data->no_tlp}}" class="form-control"></p>
                      </div>
                    </div>
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-save fa-sm"></i>&nbsp; Kirim</button>
                  @endforeach

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

@push('scripts')
<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>
@endpush