@extends('layouts.dosen')

@section('user')
<div class="info">
  <a href="#" class="d-block">
    @foreach($datas as $data)
    <span> {{$data->nama}}</span>
    &nbsp;
    @endforeach

    <p style="font-size: 11px; ">Dosen</p>
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
                <form action="{{ url('/dosen/biodata-submit') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                <table class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                    <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td colspan="2" style="border-top: none; text-align: center; font-size:18px;">ISI DATA DOSEN</td>
                    </tr>
                    <tr>
                        <td width="350px">Nama</td>
                        <td><input type="text" name="nama" class="form-control" value="{{$data->nama}}" disabled></td>
                    </tr>

                    <tr>
                        <td>Nomer NPI/NIP</td>
                        <td><input type="text" name="nim" class="form-control" value="{{$data->nip}}" disabled></td>
                    </tr>

                    <tr>
                      <td>Tanda Tangan</td>
                      <td>
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
                          <div class="col-md-6">
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

                    <tr>
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