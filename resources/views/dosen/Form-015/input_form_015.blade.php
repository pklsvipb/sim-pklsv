@extends('layouts.dosen')

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
                <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN SUPERVISI FORM 015 </div>

                @if ($userData->ttd != null)
                <div class="div">
                  <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                    <tbody>
                      <tr>
                        <td>Nama Perusahaan/Instansi</td>
                        <td>:</td>
                        <td>{{$supervisi->instansi}}</td>
                      </tr>
                      <tr>
                        <td>Alamat </td>
                        <td>:</td>
                        <td>{{$supervisi->alamat_instansi}}</td>
                      </tr>
                      <tr>
                        <td>Bidang Usaha/Kegiatan</td>
                        <td>:</td>
                        <td>{{$supervisi->bidang_usaha}}</td>
                      </tr>
                      <tr>
                        <td>Dosen Supervisi</td>
                        <td>:</td>
                        <td>{{$userData->nama}}</td>
                      </tr>
                      <tr>
                        <td>Tanggal Supervisi</td>
                        <td>:</td>
                        <td>{{ Carbon\Carbon::parse($supervisi->tanggal)->translatedFormat('d F Y'); }}</td>
                      </tr>
                    </tbody>
                  </table>
    
                 <form action="{{ url('/dosen/submit/supervisi/form015', $supervisi->id) }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <table class="table table-bordered" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                      <thead>   
                        <th width="5%">No</th>
                        <th style="text-align: center;">Keterangan</th>
                        <th style="text-align: center;">Penilaian</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Perkembangan Usaha / Kegiatan 3 tahun terakhir</td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="value1" value="Meningkat">
                              <label class="form-check-label">Meningkat</label>
                            </div>
                            
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="value1" value="Statis">
                              <label class="form-check-label">Statis</label>
                            </div>

                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="value1" value="Menurun">
                              <label class="form-check-label">Menurun</label>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>2</td>
                          <td>Perencanaaan Usaha / Kegiatan di masa yang akan datang</td>
                          <td>
                            <div class="form-check" id="2">
                              <input class="form-check-input" type="radio" name="value2" id="isian" value="Ada">
                              <label class="form-check-label">Ada rencana pengembangan usaha (max: 100 character)</label>
                            </div>

                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="value2" id="empty" value="Tidak Ada">
                              <label class="form-check-label">Tidak Ada</label>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>3</td>
                          <td>Kegiatan Perusahaan / Instansi</td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="value3" value="Sangat Aktif">
                              <label class="form-check-label">Sangat Aktif</label>
                            </div>
                            
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="value3" value="Cukup Aktif">
                              <label class="form-check-label">Cukup Aktif</label>
                            </div>

                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="value3" value="Kurang Aktif">
                              <label class="form-check-label">Kurang Aktif</label>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>4</td>
                          <td>Penerimaan Perusahaan/ Instansi</td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="value4" value="Sangat Mendukung">
                              <label class="form-check-label">Sangat Mendukung</label>
                            </div>
                            
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="value4" value="Cukup Mendukung">
                              <label class="form-check-label">Cukup Mendukung</label>
                            </div>

                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="value4" value="Kurang Mendukung">
                              <label class="form-check-label">Kurang Mendukung</label>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>5</td>
                          <td>Kelayakan sebagai tempat PKL selanjutnya</td>
                          <td>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="value5" value="Layak">
                              <label class="form-check-label">Layak</label>
                            </div>

                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="value5" value="Tidak Layak">
                              <label class="form-check-label">Tidak Layak</label>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>6</td>
                          <td colspan="2">
                            Masalah yang dihadapi Perusahaan/Instansi berkaitan dengan PKL :
                            <div class="form-inline mt-2">
                              <label>a.&nbsp;</label>
                              <input class="form-control" type="text" name="value6[]" style="width: 90%;">
                            </div>
                            <div class="form-inline mt-2">
                              <label>b.&nbsp;</label>
                              <input class="form-control" type="text" name="value6[]" style="width: 90%;">
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>7</td>
                          <td colspan="2">
                            Harapan Perusahaan/Instansi untuk PKL  selanjutnya:
                            <div class="form-inline mt-2">
                              <label>a.&nbsp;</label>
                              <input class="form-control" type="text" name="value7[]" style="width: 90%;">
                            </div>
                            <div class="form-inline mt-2">
                              <label>b.&nbsp;</label>
                              <input class="form-control" type="text" name="value7[]" style="width: 90%;">
                            </div> 
                          </td>
                        </tr>

                        <tr>
                          <td>8</td>
                          <td colspan="2">
                            Masalah yang dihadapi mahasiswa berkaitan dengan PKL :
                            <div class="form-inline mt-2">
                              <label>a.&nbsp;</label>
                              <input class="form-control" type="text" name="value8[]" style="width: 90%;">
                            </div>
                            <div class="form-inline mt-2">
                              <label>b.&nbsp;</label>
                              <input class="form-control" type="text" name="value8[]" style="width: 90%;">
                            </div> 
                          </td>
                        </tr>

                        <tr>
                          <td>9</td>
                          <td colspan="2">
                            Harapan mahasiswa untuk PKL selanjutnya :
                            <div class="form-inline mt-2">
                              <label>a.&nbsp;</label>
                              <input class="form-control" type="text" name="value9[]" style="width: 90%;">
                            </div>
                            <div class="form-inline mt-2">
                              <label>b.&nbsp;</label>
                              <input class="form-control" type="text" name="value9[]" style="width: 90%;">
                            </div> 
                          </td>
                        </tr>

                        <tr>
                          <td>10</td>
                          <td colspan="2">
                            Lain-lain :
                            <div class="form-inline mt-2">
                              <label>a.&nbsp;</label>
                              <input class="form-control" type="text" name="value10[]" style="width: 90%;">
                            </div>
                            <div class="form-inline mt-2">
                              <label>b.&nbsp;</label>
                              <input class="form-control" type="text" name="value10[]" style="width: 90%;">
                            </div> 
                          </td>
                        </tr>
                      </tbody>                      
                    </table>

                    <div class="row">
                      <div class="col-md-9"></div>
                      <div class="col-md-3 mt-5">
                        <label style="font-size: 14px;">Tanggal Berita Acara</label>
                        <input type="date" class="form-control" name="tgl" value="{{$supervisi->tanggal}}" style="border: none; border-bottom: 1px solid black; border-radius: 0px;">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-9 mt-5"></div>
                      <div class="col-md-3" style="text-align: center;">
                      <p style="padding-top:10px; margin-bottom:-2px; font-weight: 600; font-size: 14px; text-align: left;">Dosen Supervisi</p>
                        <br>
                        <img src="{{asset($userData->ttd)}}" style="width: 3cm; height: 2cm;">
                        <div>
                          <p style="padding-top:10px; margin-bottom:-2px; font-weight: 600; font-size: 14px; text-align: left;">{{$userData->nama}}</p>
                        </div>
                      </div>
                    </div>
                    <br><br>

                    <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-save fa-sm"></i>&nbsp; Simpan</button>
                  </form>
                </div> 

                @else     
                <div class="row">
                  <div class="col-md-12">
                    <p style="text-align: center; margin-top:50px; color:red;"> Isi Tanda Tangan terlebih dahulu, pada menu biodata. </p>
                  </div>
                </div>
                @endif
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
    $('#isian').click(function() {
      $('#2').append('<input class="form-control" id="isian2" type="text" name="isian_value2" placeholder="tulis disini">');
    });

    $(document).on('click', '#empty', function() {
      $('#isian2').remove();
    });
  });
</script>
@endpush