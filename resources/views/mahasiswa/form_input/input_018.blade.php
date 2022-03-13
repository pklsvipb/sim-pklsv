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
                  FORM 018 <br>
                  PERSETUJUAN SEMINAR HASIL PKL
                </div>                    
                @foreach ($datas as $data)

                @if ($form018 != null)
                  @if ($form018->ttd_dospem == 1)
                  <form action="{{ url('/mahasiswa/form018/delete', $id) }}" method="POST" class="form-horizontal">
                  @csrf
                    <a type="button" class="btn btn-danger" href="{{ asset('pdf/'.$data->nim.'/pdf_form_018.pdf') }}" style="font-size: 13px; margin: 50px 0px 10px 0px;"><i class="fas fa-file-pdf"></i> Form 018 Persetujuan Seminar Hasil PKL</a>
                    <button type="submit" class="btn btn-danger" style="font-size: 13px; margin: 50px 0px 10px 0px;" onclick="return confirm('Yakin ingin menghapus form 018?')"><i class="fa fa-trash"></i></button>
                  </form>

                  <table cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;" width="100%">
                    <tbody>
                      <tr>
                        <td width="100%">
                          Form 018 Belum Ditanda Tangan Oleh Dosen Pembimbing
                        </td>
                      </tr>
                    </tbody>
                  </table>   

                  @else
                  
                  <table cellspacing="0" cellpadding="0" style="margin-top: 3rem; text-align: center; font-size: .875rem; font-weight: 600;" width="100%">
                    <tbody>
                      <tr>
                        <td width="100%">
                          Form 018 Sudah Ditanda Tangan Oleh Dosen Pembimbing dan Sedang Diverifikasi Panitia
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  @endif

                @else
                <form action="{{ route('form018-pdf', $id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                  <tbody>
                    <tr>
                      <td width="20%">Nama</td>
                      <td>:</td>
                      <td width="80%"><input type="text" value="{{$data->nama}}" class="form-control" disabled></td>
                    </tr>
                    <tr>
                      <td>NIM</td>
                      <td>:</td>
                      <td><input type="text" value="{{$data->nim}}" class="form-control" disabled></td>
                    </tr>
                    <tr>
                      <td>Program Studi</td>
                      <td>:</td>
                      <td><input type="text" value="{{$data->getProdi->nama}}" class="form-control" disabled></td>
                    </tr>
                    <tr>
                      <td>Judul Laporan PKL</td>
                      <td>:</td>
                      <td><textarea name="judul" rows="2" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                      <td colspan="3"><br><br></td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        telah layak melaksanakan seminar hasil PKL dengan jadwal:
                      </td>
                    </tr>
                    </tr>
                    <tr>
                      <td>&nbsp;&nbsp;&nbsp; Tanggal</td>
                      <td>:</td>
                      <td><input type="date" name="tanggal" class="form-control"></td>
                    </tr>
                  </tbody>
                </table>                
                <br>
                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: ;"><i class="fas fa-save fa-sm"></i>&nbsp; Kirim</button>

                </form>
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