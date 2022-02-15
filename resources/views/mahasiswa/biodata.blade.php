@extends('layouts.mahasiswa')

@section('user')
<div class="info">
  <a href="#" class="d-block">
    @foreach($datas as $data)
    <span> {{$data->nama}}</span>
    &nbsp;
    @endforeach

    <p style="font-size: 11px; ">Mahasiswa</p>
  </a>
</div>
@endsection

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
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <form action="{{ url('/mahasiswa/biodata-submit') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                <table class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                    <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td colspan="3" style="border-top: none; text-align: center; font-size:18px;">ISI DATA MAHASISWA</td>
                    </tr>
                    
                    <tr>
                      <td>Foto Diri (Usahakan berukuran 3x4) <i style="color: red;">*</i></td>
                      @if (is_null($data->foto))
                      <td>
                        <input type="file" name="foto" accept=".jpg, .jpeg" data-allowed-file-extensions='["jpg", "jpeg"]' id="input-file-now" class="dropify" data-max-file-size="3000K"/>
                        <p class="help-block" style="font-size: 12px;">Max Filesize 3 MB (JPG/JPEG)</p>
                      </td>
                      @else
                      <td><img id="preview" src="{{ asset($data->foto)}}" style="height: 6cm; width: 4cm;"></td>
                      <td>
                        <input type="file" name="foto" accept=".jpg, .jpeg" data-allowed-file-extensions='["jpg", "jpeg"]' id="input-file-now" class="dropify" data-max-file-size="3000K"/>
                        <p class="help-block" style="font-size: 12px;">Max Filesize 3 MB (JPG/JPEG)</p>
                      </td>
                      @endif
                    </tr>

                    <tr>
                      <td>Bidang Kajian <i style="color: red;">*</i></td>
                      <td colspan="2">
                          <select name="kajian" class="form-control select2 select2-hidden-accessible"  style="width: 100%;">
                              @if ($data->id_prodi == 1)
                                @if ($data->kajian == null)
                                <option selected="selected" disabled> Pilih bidang kajian </option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Multimedia">Multimedia</option>
                                @else
                                    @if ($data->kajian == "Sistem Informasi")
                                    <option selected="selected" value="{{$data->kajian}}">Sistem Informasi</option>
                                    <option value="Multimedia">Multimedia</option>
                                    @else
                                    <option selected="selected" value="{{$data->kajian}}">Multimedia</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                    @endif
                                @endif   
                              @endif
                              @if ($data->id_prodi == 2)
                                @if ($data->kajian == null)
                                <option selected="selected" disabled> Pilih bidang kajian </option>
                                <option value="Jaringan">Jaringan</option>
                                <option value="Hardware">Hardware</option>
                                @else
                                    @if ($data->kajian == "Jaringan")
                                    <option selected="selected" value="{{$data->kajian}}">Jaringan</option>
                                    <option value="Hardware">Hardware</option>
                                    @else
                                    <option selected="selected" value="{{$data->kajian}}">Hardware</option>
                                    <option value="Jaringan">Jaringan</option>
                                    @endif
                                @endif   
                              @endif
                          </select>
                      </td>
                    </tr>

                    <tr>
                      <td>Nama Instansi PKL <i style="color: red;">*</i></td>
                      <td colspan="2"><input type="text" name="instansi" class="form-control" value="{{$data->instansi}}" placeholder="Tuliskan nama instansi perusahaan" required></td>
                    </tr>

                    <tr>
                      <td>Alamat Instansi PKL <i style="color: red;">*</i></td>
                      <td colspan="2">
                          <textarea name="alamat_instansi" rows="2" class="form-control" required>{{$data->alamat_instansi}}</textarea>
                      </td>
                    </tr>

                    <tr>
                        <td width="400px">Nama</td>
                        <td colspan="2"><input type="text" name="nama" class="form-control" value="{{$data->nama}}" disabled></td>
                    </tr>

                    <tr>
                        <td>NIM</td>
                        <td colspan="2"><input type="text" name="nim" class="form-control" value="{{$data->nim}}" disabled></td>
                    </tr>

                    <tr>
                        <td>Tempat Lahir <i style="color: red;">*</i></td>
                        <td colspan="2"><input type="text" name="tempat_lahir" class="form-control" value="{{$data->tempat_lahir}}" placeholder="Mis: Bogor" required></td>
                    </tr>

                    <tr>
                      <td>Tanggal Lahir <i style="color: red;">*</i></td>
                      <td colspan="2"><input type="date" name="tanggal_lahir" class="form-control" value="{{$data->tanggal_lahir}}" required></td>
                    </tr>

                    <tr>
                      <td>Alamat Terbaru <i style="color: red;">*</i></td>
                      <td colspan="2">
                          <textarea name="alamat" rows="2" class="form-control" required>{{$data->alamat}}</textarea>
                      </td>
                    </tr>

                    <tr>
                      <td>No. Telp. / HP <i style="color: red;">*</i></td>
                      <td colspan="2"><input type="number" name="no_tlp" class="form-control" value="{{$data->no_tlp}}" placeholder="Mis: 082334231323" required></td>
                    </tr>

                    <tr>
                      <td>Email <i style="color: red;">*</i></td>
                      <td colspan="2"><input type="email" name="email" class="form-control" value="{{$data->email}}" placeholder="Tuliskan alamat email" required></td>
                    </tr>

                    <tr>
                      <td>Asal SMA <i style="color: red;">*</i></td>
                      <td colspan="2"><input type="text" name="asal_sma" class="form-control" value="{{$data->asal_sma}}" placeholder="Tuliskan asal SMA" required></td>
                    </tr>

                    <tr>
                      <td>Tahun Lulus SMA <i style="color: red;">*</i></td>
                      <td colspan="2"><input type="text" name="tahun_lulus" class="form-control" value="{{$data->tahun_lulus}}" placeholder="Tuliskan tahun lulus SMA" required></td>
                    </tr>

                    <tr>
                      <td>Tahun Masuk IPB <i style="color: red;">*</i></td>
                      <td colspan="2"><input type="text" name="tahun_masuk" class="form-control" value="{{$data->tahun_masuk}}" placeholder="Tuliskan tahun masuk IPB" required></td>
                    </tr>

                    <tr>
                        <td>Jalur Masuk IPB <i style="color: red;">*</i></td>
                        <td colspan="2">
                            <select name="jalur" class="form-control select2 select2-hidden-accessible"  style="width: 100%;" required>
                                @if ($data->jalur == null)
                                <option selected="selected" disabled> Pilih jalur masuk </option>
                                <option value="USMI">USMI</option>
                                <option value="Reguler">Reguler</option>
                                @else
                                    @if ($data->jalur == "USMI")
                                    <option selected="selected" value="{{$data->jalur}}">{{$data->jalur}}</option>
                                    <option value="Reguler">Reguler</option>
                                    @else
                                    <option selected="selected" value="{{$data->jalur}}">{{$data->jalur}}</option>
                                    <option value="USMI">USMI</option>
                                    @endif
                                @endif
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Nilai IPK Tingkat 1 dan 2 (mis: 3,15) <i style="color: red;">*</i></td>
                        <td colspan="2">
                          <div class="row">
                            <div class="col-md-6">
                              <input type="text" class="form-control" name="ipk1" value="{{$data->ipk1}}" required placeholder="IPK Tingkat I">
                            </div>
                            <div class="col-md-6">
                              <input type="text" class="form-control" name="ipk2" value="{{$data->ipk2}}" required placeholder="IPK Tingkat II">
                            </div>
                          </div>
                        </td>
                    </tr>

                    <tr>
                      <td>Tanda Tangan <i style="color: red;">*</i></td>
                      <td colspan="2">
                        <style>
                          .kbw-signature {
                            width: 100%;
                            height: 100px;
                          }

                          #sig canvas {
                            width: 100% !important;
                            height: auto;
                          }

                          #prev canvas {
                            width: 70% !important;
                            height: auto;
                          }
                        </style>

                        <div class="row">
                          <div class="col-md-5">
                            <label style="font-size: 14px;">Preview</label>
                            <br />
                            @if ($data->ttd != null)
                            <img id="preview" src="{{ asset($data->ttd)}}" style="width: auto; height: 2.5cm;">
                            @else
                            <img src="javascript:;" id="preview" style="display: none;">
                            @endif
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-6.5">
                            <br />
                            <div id="sig"></div>
                            <br />
                            <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                            <button id="show" class="btn btn-primary btn-sm">Preview</button>
                            <input type="file" name="gambar" id="gambar" accept="image/*" style="display:none;" onchange="tampil()">
                            <a type="button" id="upload" name="upload" class="btn btn-secondary btn-sm">Choose File</a>
                            <textarea id="signature64" name="signed" style="display: none"></textarea>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr colspan="2">
                        <td style="border-top: none;"></td>
                        <td style="border-top: none;"><button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save fa-sm"></i> Simpan</button></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
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
    <!-- /.row -->

  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection

<!-- https://medium.com/@tarekabdelkhalek/how-to-create-a-drag-and-drop-file-uploading-in-angular-78d9eba0b854 -->

@push('scripts')
<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
  });

  function selectRefresh() {
    $('.select2').select2({
      //-^^^^^^^^--- update here
      tags: true,
      width: '100%'
    });
  }
</script>
<script type="text/javascript">
  document.getElementById('upload').addEventListener('click', openDialog);

  function openDialog() {
    document.getElementById('gambar').click();
  }

  function tampil() {
    $("#preview").show();
    preview.src   = URL.createObjectURL(event.target.files[0]);
    preview.style.height = '100px';
    preview.style.width = 'auto';
    preview.style.textAlign = 'center';
  }
</script>

<script type="text/javascript">
  var sig = $('#sig').signature({
    syncField: '#signature64',
    syncFormat: 'PNG'
  });

  $('#clear').click(function(e) {
    e.preventDefault();
    sig.signature('clear');
    $("#signature64").val('');
  });

  $('#show').click(function(e) {
    e.preventDefault();
    var data = $('#sig').signature('toDataURL', 'image/png');
    $("#preview").show();
    $("#preview").attr("src", data);
  })
</script>
@endpush