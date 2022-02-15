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
              <div class="col-md-12 mb-4 text-center">
                <div class="title bg">Bar Progress Seminar</div>
              </div>
              <div class="progress2" style="background-color: white; margin: auto;">
                <?php $no = 1;
                $id = 0; ?>
                @foreach ($forms as $form)
                  @if($file[$id][0] == 0)
                  <div class="circle">
                    <p class="label">{{$no}}</p>
                    <p class="title">{{substr($form->nama,0,8)}}</p>
                  </div>
                  @else
                  @if($file[$id][1] == 1)
                  <div class="circle done">
                    <p class="label"><i class="fas fa-check"></i></p>
                    <p class="title">{{substr($form->nama,0,8)}}</p>
                  </div>
                  @else
                  @if($file[$id][2] == 0)
                  <div class="circle wait">
                    <p class="label"><i class="fas fa-ellipsis-h"></i></p>
                    <p class="title">{{substr($form->nama,0,8)}}</p>
                  </div>
                  @else
                  <div class="circle">
                    <p class="label">{{$no}}</p>
                    <p class="title">{{substr($form->nama,0,8)}}</p>
                  </div>
                  @endif
                  @endif
                  @endif
                <?php $no += 1;
                $id += 1; ?>
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
    <!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="row text-center">

                  <style>
                    #menu-pertama{
                      padding: 7px 0px;
                      margin-bottom: 10px;
                      border-bottom: 2px solid black;
                    }

                    #menu-pertama a{
                      color: black;
                      font-weight: 600;
                      font-size: 13px;
                    }

                    #menu-pertama:hover{ 
                      background: #f8f9f9;
                    }

                    #menu-kedua{
                      padding: 7px 0px;
                      margin-bottom: 10px;
                    }

                    #menu-kedua a{
                      color: black;
                      font-weight: 600;
                      font-size: 13px;
                    }

                    #menu-kedua:hover{
                      background: #f8f9f9;
                    }
                  </style>

                  <div class="col-md-6" id="menu-pertama">
                    <a href="{{ route('seminar') }}" style="text-decoration: none; padding: 17px 150px;">DOWNLOAD DAN UPLOAD FORM</a>
                  </div>
                  <div class="col-md-6" id="menu-kedua">
                    <a href="{{ route('d-seminar') }}" style="text-decoration: none; padding: 17px 197px;">DAFTAR SEMINAR</a>
                  </div>
                  
                </div>
                <table class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
                  <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th style="text-align: center;">File</th>
                    <th style="text-align: center;">Status</th>
                    <th>Aksi</th>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    $id = 0; ?>
                    @foreach ($forms as $form)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $form->nama }}</td>
                      <td style="text-align: center;"><a href="{{ asset($form->file) }}" download="{{$form->file}}.docx"><i class="fas fa-file-word fa-lg"></i></a></td>

                      @if($file[$id][0] == 0)
                      <td style="text-align: center;">
                        <a type="button" class="btn btn-sm btn-secondary" style="font-size: 11px;" disabled>Belum Upload</a>
                      </td>
                      <td>
                        <a type="button" class="btn btn-warning btn-icon btn-sm" data-toggle="modal" data-target="#Upload-{{$form->id}}" title="Upload File"><i class="fas fa-file-upload fa-sm"></i> Upload</a>
                      </td>

                      @else
                      @if($file[$id][1] == 1)
                      <td style="text-align: center;">
                        <a type="button" class="btn btn-sm btn-success" style="font-size: 11px;" disabled>Disetujui</a>
                      </td>
                      <td></td>
                      @else
                      @if($file[$id][2] == 0)
                      <td style="text-align: center;">
                        <a type="button" class="btn btn-sm btn-warning" style="font-size: 11px;" disabled>Menunggu</a>
                      </td>
                      <td></td>
                      @elseif($file[$id][2] == 1)
                      <td style="text-align: center;">
                        <a type="button" class="btn btn-sm btn-danger" style="font-size: 11px;" disabled>Ditolak</a>
                        <a type="button" class="btn btn-danger btn-icon btn-sm" data-toggle="modal" style="font-size: 11px;" data-target="#Komen-{{$form->id}}" title="Upload File"><i class="fas fa-info fa-sm"></i></a>
                        @include('modal.komen')
                      </td>
                      <td>
                        <a type="button" class="btn btn-danger btn-icon btn-sm" data-toggle="modal" data-target="#Upload-{{$form->id}}" title="Upload File"><i class="fas fa-file-upload fa-sm"></i> Upload</a>
                      </td>
                      @endif
                      @endif
                      @endif
                      
                    </tr>
                    <?php $no += 1;
                    $id += 1; ?>
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
@if(is_null($forms) == 0)
@foreach($forms as $form)
@include('modal.upload-file')
@endforeach
@endif

@endsection

