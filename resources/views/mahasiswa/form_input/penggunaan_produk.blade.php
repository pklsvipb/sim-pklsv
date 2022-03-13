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
                  FORMULIR PENGGUNAAN PRODUK TUGAS AKHIR
                </div>
                @foreach ($datas as $data)

                @if (File::exists(public_path('pdf/'.$data->nim.'/pdf_penggunaan_produk.pdf')))
                <form action="{{ url('/mahasiswa/penggunaan_produk/delete') }}" method="POST" class="form-horizontal">
                  @csrf
                  <a type="button" class="btn btn-danger" href="{{ asset('pdf/'.$data->nim.'/pdf_penggunaan_produk.pdf') }}" style="font-size: 13px; margin: 50px 0px 10px 0px;"><i class="fas fa-file-pdf"></i> Form Penggunaan Produk</a>
                  <button type="submit" class="btn btn-danger" style="font-size: 13px; margin: 50px 0px 10px 0px;" onclick="return confirm('Yakin ingin menghapus form penggunaan produk?')"><i class="fa fa-trash"></i></button>
                </form>  

                <form action="{{ route('penggunaan-produk-pdf', $id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <table cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;" width="100%">
                    <tbody>
                      <tr>
                        <td width="100%">
                          Upload kembali setelah dokumen ditandatangani dan distempel oleh pembimbing lapangan
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <input type="file" name="upload" accept=".docx, .pdf" data-allowed-file-extensions='["pdf", "docx"]' id="input-file-now" class="dropify" data-max-file-size="3000K" />
                          <p class="help-block" style="font-size: 12px;">Max Filesize 3 MB (PDF)</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-save fa-sm"></i>&nbsp; Kirim</button>
                </form>

                @else
                <form action="{{ route('penggunaan-produk-pdf-save', $id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <table cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 50px 0px;">
                    <tbody>
                      <tr>
                        <td width="20%">Nama Perusahaan/ Instansi</td>
                        <td>:</td>
                        <td width="80%;"><input type="text" name="instansi" class="form-control" value="{{$data->instansi}}" disabled></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><textarea name="alamat" rows="2" class="form-control" disabled>{{$data->alamat_instansi}}</textarea></td>
                      </tr>
                      <tr>
                        <td>Pembimbing Lapangan</td>
                        <td>:</td>
                        <td><input type="text" name="pemlap" class="form-control"></td>
                      </tr>
                      <tr>
                        <td colspan="3">
                          <br><br>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3">
                          Dengan ini Pembimbing Lapangan PKL menyatakan bahwa karya mahasiswa berikut :
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp; Nama</td>
                        <td>:</td>
                        <td><input type="text" value="{{$data->nama}}" class="form-control" disabled></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp; NIM</td>
                        <td>:</td>
                        <td><input type="text" value="{{$data->nim}}" class="form-control" disabled></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp; Program Studi</td>
                        <td>:</td>
                        <td><input type="text" value="{{$data->getProdi->nama}}" class="form-control" disabled></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp; Judul Laporan Akhir</td>
                        <td>:</td>
                        <td><textarea name="judul" rows="2" class="form-control"></textarea></td>
                      </tr>
                    </tbody>
                  </table>
                  <br>
                  <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-save fa-sm"></i>&nbsp; Kirim</button>

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