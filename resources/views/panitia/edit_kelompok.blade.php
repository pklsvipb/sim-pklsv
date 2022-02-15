@extends('layouts.panitia')

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12">
        @if ($message = Session::get('success'))
        <div id="messageAlert" class="alert alert-success alert-dismissible">
          <i class="fa fa-check"></i> &nbsp; {{ $message }}
        </div>
        @elseif ($message = Session::get('failed'))
        <div id="messageAlert" class="alert alert-danger alert-dismissible">
          <i class="fa fa-check"></i> &nbsp; {{ $message }}
        </div>
        @endif
        <div class="card">
          <div class="card-header">
            <!-- <h5 class="card-title">Profile</h5> -->
            <h1 class="card-title" style="font-weight: 600; font-size: 1.2rem;">Form <small style="font-size: 12px; color: #777;">Data Kelompok > Insert</small></h1>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">

                <form action="{{ url('/panitia/edit/kelompok-mahasiswa/submit') }}" method="POST" class="form-horizontal">
                  {{ csrf_field() }}

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Kelompok<i style="color: red">*</i></label>
                    <div class="col-sm-6">
                      <input type="hidden" name="nama_kel_old" value="{{ $namakel }}">
                      <input type="text" name="nama_kel" value="{{ $namakel }}" class="form-control">
                    </div>
                  </div>
                  <div class="mhs mb-5">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Mahasiswa<i style="color: red">*</i></label>
                      <div class="col-sm-6 ">
                        <select class="form-control select2 select2-hidden-accessible" name="id[]" style="width: 100%;">
                          <option selected="selected" disabled>Pilih Mahasiswa</option>
                          @foreach($mahasiswas as $mahasiswa)
                          <option value="{{$mahasiswa->id}}">{{ $mahasiswa->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-sm-2">
                        <span>
                          <a type="button" id="add" class="btn btn-primary btn-sm mt-1"><i class="fas fa-plus"></i></a>
                        </span>
                      </div>
                    </div>
                  </div>

                  <table id="datatable2" class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline collapsed" style="font-size: 12px; font-weight: 400; color: black; width: 100%;" width="100%" role="grid" aria-describedby="data-table_info">
                    <tbody>
                      <?php $no = 1; ?>
                      @foreach ($getkelompok as $get)
                      <input type="hidden" name="dospem1" value="{{ $get->id_dospem1 }}">
                      <input type="hidden" name="dospem2" value="{{ $get->id_dospem2 }}"> 
                          <tr>
                            <td style="text-align: center;" width="20px">{{$no}}</td>
                            <td style="text-align: center;">{{$get->nama}}</td>
                            <td style="text-align: center;" width="200px">{{$get->nim}}</td>
                            <td style="text-align: center;" width="200px">{{$get->getProdi->nama}}</td>
                            <td width="70px"><a data-toggle="modal" data-target="#Del-{{$get->id}}" title="Delete Mahasiswa" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i> Delete</a></td>
                          </tr>
                      <?php $no += 1; ?>
                      @endforeach
                    </tbody>
                  </table>

                  <div class="form-group row" style="text-align: left; margin-top: 1.5em;">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-6">
                      <a href="{{route('pembimbing-p')}}" type="button" name="back" id="back" class="btn btn-primary" style="font-size: 12px;"><i class="fas fa-arrow-circle-left fa-sm"></i> Cancel</a>
                      <button type="submit" name="setup" value="setup" class="btn btn-success btn-sm"><i class="fa fa-save fa-sm"></i>&nbsp; Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
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

  @if(is_null($getkelompok) == 0)
    @foreach ($getkelompok as $get)
      @include('modal.delete-mhs') 
    @endforeach 
  @endif 

@endsection

@push('scripts')
<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>

<script>
  function selectRefresh() {
    $('.select2').select2({
      //-^^^^^^^^--- update here
      tags: true,
      width: '100%'
    });
  }

  $(document).ready(function() {

    var i = 1;
    $('#add').click(function() {
      i++;
      $('.mhs').append('<div class="form-group row" id="group' + i + '"><label class="col-sm-3 col-form-label"></label><div class="col-sm-6 "><select class="form-control select2 select2-hidden-accessible" name="id[]" style="width: 100%;"><option selected="selected" disabled>Pilih Mahasiswa</option>@foreach($mahasiswas as $mahasiswa)<option value="{{$mahasiswa->id}}">{{ $mahasiswa->nama }}</option>@endforeach</select></div><div class="col-sm-2"><span><a type="button" id="' + i + '" class="btn btn-danger btn-sm mt-1"><i class="fa fa-times fa-md"></i></a></span></div></div>');
      selectRefresh();
    });

    $(document).on('click', '.btn', function() {
      var button_id = $(this).attr("id");
      $('#group' + button_id + '').remove();
    });

  });
</script>
@endpush