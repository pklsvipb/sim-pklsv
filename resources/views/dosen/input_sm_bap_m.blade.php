@extends('layouts.dosen')

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11" style="margin: auto;">
        @foreach ($datas as $data)

        @if ($data->ttd != null)
        <form action="{{ url('/dosen/submit/seminar-bap-moderator', $kode->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 mb-5">
                  <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN BAP SEMINAR </div>
                  <div class="div">
                    <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                      <tbody>
                        <tr>
                          <td>Nama Penyaji</td>
                          <td>:</td>
                          <td>{{$mhs->nama}}</td>
                        </tr>
                        <tr>
                          <td>NIM </td>
                          <td>:</td>
                          <td>{{$mhs->nim}}</td>
                        </tr>
                        <tr>
                          <td>Hari/Tanggal</td>
                          <td>:</td>
                          <td>{{ Carbon\Carbon::parse($kode->tgl)->translatedFormat('l/ d F Y'); }}</td>
                        </tr>
                        <tr>
                          <td>Waktu</td>
                          <td>:</td>
                          <td>{{date('H:i', strtotime($kode->waktu))}}</td>
                        </tr>
                        <tr>
                          <td>Judul Tugas Akhir</td>
                          <td>:</td>
                          <td>{{$kode->judul}}</td>
                        </tr>
                      </tbody>
                    </table>

                    <p style="font-size: .875rem; font-weight: 600;">Penilaian :</p>
                    <table class="table table-bordered text-center" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                      <input type="text" name="id_mhs" value="{{$mhs->id}}" hidden>
                      <thead>
                        <tr>
                          <td rowspan="2">No.</td>
                          <td rowspan="2" style="vertical-align : middle;">Aspek</td>
                          <td rowspan="2" style="vertical-align : middle;">Bobot</td>
                          <td colspan="2">Dosen Moderator</td>
                        </tr>
                        <tr>
                          <td>Nilai</td>
                          <td>Bobot x Nilai</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1. </td>
                          <td style="text-align: left;">Format dan substansi makalah</td>
                          <td>30%</td>
                          <td><input type="number" class="form-control" name="nilai1" required></td>
                          <td><input type="number" class="form-control" disabled name="nilai1_1"></td>
                        </tr>
                        <tr>
                          <td>2. </td>
                          <td style="text-align: left;">Penyajian makalah</td>
                          <td>30%</td>
                          <td><input type="number" class="form-control" name="nilai2" required></td>
                          <td><input type="number" class="form-control" disabled name="nilai2_1"></td>
                        </tr>
                        <tr>
                          <td>3. </td>
                          <td style="text-align: left;">Argumentasi dalam forum diskusi</td>
                          <td>40%</td>
                          <td><input type="number" class="form-control" name="nilai3" required></td>
                          <td><input type="number" class="form-control" disabled name="nilai3_1"></td>
                        </tr>
                        <tr>
                          <td colspan="2">Total</td>
                          <td>100%</td>
                          <td><input type="number" class="form-control" disabled name="total1"></td>
                          <td><input type="number" class="form-control" disabled name="total2"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- ./card-body -->

          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 mb-5">
                  <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN PEMBAHAS SEMINAR </div>
                  <div class="div">
                    <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                      <tbody>
                        <tr>
                          <td>Mahasiswa Pembahas</td>
                          <td>:</td>
                          <td>
                            <select class="form-control select2" name="pembahas" style="width: 100%;">
                              @if ($kode->id_pembahas != 0)
                              <option selected="selected" value="{{$pembahas->id}}">{{$pembahas->nim}} - {{$pembahas->nama}}</option>
                              @endif

                              @foreach($mahasiswas as $pm)
                              <option value="{{$pm->id}}">{{$pm->nim}} - {{$pm->nama}}</option>
                              @endforeach
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3">
                            <small style="color: red;">Ubah mahasiswa pembahas jika saat seminar pembahas berubah</small>
                          </td>
                        </tr>
                        <tr>
                          <td>Hari/Tanggal</td>
                          <td>:</td>
                          <td>{{ Carbon\Carbon::parse($kode->tgl)->translatedFormat('l/ d F Y'); }}</td>
                        </tr>
                        <tr>
                          <td>Waktu</td>
                          <td>:</td>
                          <td>{{date('H:i', strtotime($kode->waktu))}}</td>
                        </tr>
                        <tr>
                          <td>Nama Penyaji</td>
                          <td>:</td>
                          <td>{{$mhs->nama}}</td>
                        </tr>
                        <tr>
                          <td>NIM </td>
                          <td>:</td>
                          <td>{{$mhs->nim}}</td>
                        </tr> 
                        <tr>
                          <td>Judul Makalah</td>
                          <td>:</td>
                          <td>{{$kode->judul}}</td>
                        </tr>
                        <tr></tr>
                        <tr>
                          <td>Nilai</td>
                          <td>:</td>
                          <td><input type="number" name="nilai_pembahas" class="form-control" required></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- ./card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 mb-5">
                  <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN FORM PENILAIAN FORUM SEMINAR DAN DAFTAR HADIR </div>
                  <div class="div">
                    <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px 30px 0px;">
                      <tbody>
                        <tr>
                          <td>Hari/Tanggal</td>
                          <td>:</td>
                          <td>{{ Carbon\Carbon::parse($kode->tgl)->translatedFormat('l/ d F Y'); }}</td>
                        </tr>
                        <tr>
                          <td>Nama Pemrasaran</td>
                          <td>:</td>
                          <td>{{$mhs->nama}}</td>
                        </tr>
                        <tr>
                          <td>NIM </td>
                          <td>:</td>
                          <td>{{$mhs->nim}}</td>
                        </tr> 
                      </tbody>
                    </table>
                    
                    <small style="color: red;"> Pengisian nilai dan keterangan hanya kepada forum yang bertanya pada saat seminar, selebihnya dikosongkan</small>
                    <table id="datatable" class="table table-bordered" cellspacing="0" cellpadding="0" style="font-size: .875rem;">
                      <thead>
                        <tr>
                          <th width="5%">NO</th>
                          <th width="30%">NAMA</th>
                          <th width="10%">NIM</th>
                          <th width="15%">HADIR</th>
                          <th width="15%">NILAI</th>
                          <th width="25%">KETERANGAN</th>
                        </tr>  
                      </thead>
                      <tbody>
                        <?php $no = 1 ?>
                        @foreach ($kartu_sm as $kartu)
                        <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $kartu->getMhs->nama }}</td>
                          <td>{{ $kartu->getMhs->nim }}</td>
                          <td>
                            <input type="hidden" name="id_hadir[]" value="{{$kartu->id}}">
                            @if ($kartu->hadir == 1)
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="hadir{{$kartu->id}}" value="1" checked>
                              <label class="form-check-label">Hadir</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="hadir{{$kartu->id}}" value="0">
                              <label class="form-check-label">Tidak Hadir</label>
                            </div>
                            @else
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="hadir{{$kartu->id}}" value="1">
                              <label class="form-check-label">Hadir</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="hadir{{$kartu->id}}" value="0" checked>
                              <label class="form-check-label">Tidak Hadir</label>
                            </div>
                            @endif
                          </td>
                          <td><input type="number" name="nilai_forum{{$kartu->id}}" class="form-control"></td>
                          <td><textarea name="ket_forum{{$kartu->id}}" rows="1" class="form-control"></textarea></td>
                        </tr>
                        <?php $no += 1 ?>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- ./card-body -->

          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 mb-5">
                  <div class="div">
                    <div class="row">
                      <div class="col-md-8"></div>
                      <div class="col-md-4 mt-5">
                        <label style="font-size: 14px;">Tanggal Pengisian</label>
                        <input type="date" class="form-control" name="tgl" value="{{$kode->tgl}}" style="border: none; border-bottom: 1px solid black; border-radius: 0px;">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-8 mt-5"></div>
                      <div class="col-md-4">
                        <br>
                        <img src="{{asset($data->ttd)}}" style="width: 3cm; height: 2cm;">
                        <div>
                          <p style="padding-top:10px; margin-bottom:-2px; font-weight: 600; font-size: 14px;">{{$data->nama}}</p>
                          <p style="font-weight: 600; font-size: 14px;">NPI {{$data->nip}}</p>
                        </div>
                      </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-save fa-sm"></i>&nbsp; Kirim</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ./card-body -->
          </div>
          <!-- /.card -->
        </form>

        @else    
        <div class="card">
          <div class="card-body"> 
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="title text-center" style="font-weight: 600;"> REQUEST PENGISIAN <FORM-FORM></FORM-FORM> SEMINAR </div>
                <div class="row">
                  <div class="col-md-12">
                    <p style="text-align: center; margin-top:50px; color:red;"> Isi Tanda Tangan terlebih dahulu, pada menu biodata. </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
        @endforeach
        
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
    $("#datatable").DataTable({
      "responsive": true,
      "lengthChange": true,
      "aLengthMenu": [
        [5, 25, 50, 75, -1],
        [5, 25, 50, 75, "All"]
      ],
      "paging": false,
      "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>
@endpush