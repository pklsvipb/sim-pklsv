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
                <table class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;"> 
                  <tbody> 
                    @foreach($datas as $data) 
                    <tr> 
                      <td width="400px" style="border-top: none;">Nama</td> 
                      <td style="border-top: none;">{{$data->nama}}</td> 
                    </tr> 
                    <tr> 
                      <td width="400px">NIP</td> 
                      <td>{{$data->nip}}</td> 
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
 
    <div class="row"> 
      <div class="col-md-12"> 
        <div class="card"> 
          <div class="card-body"> 
            <div class="row"> 
              <div class="col-md-12 mb-5"> 
                <small>*Klik profile jika ingin melihat detail progress mahasiswa</small>
                <br><br>
                <div class="title text-center" style="font-weight: 600;">PROGRESS MAHASISWA BIMBINGAN PERTAMA</div> 
              </div> 
            </div> 
            <?php 
              $no = 0;   
            ?> 
            @foreach ($mhs as $bimbingan) 
            <div class="row pb-2"> 
              <div class="col-md-1"></div> 
              <div class="col-md-2 mb-4 text-center"> 
                <a data-toggle="modal" data-target="#Status-{{$bimbingan->id}}" title="Status Mahasiswa" type="button"> 
                  <i class="fa fa-user-circle fa-4x text-primary"></i> 
                </a> 
              </div> 
              <div class="col-md-4 mb-4"> 
                <h1 style="font-size: 16px; font-weight: 600;">{{$bimbingan->nim}}</h1> 
                <h1 style="font-size: 14px;">{{$bimbingan->nama}}</h1> 
                <h1 style="font-size: 14px;">{{$bimbingan->getProdi->nama}}</h1> 
              </div> 
              <div class="col-md-5 mb-4"> 
                <div class="progress" style="background-color: white; margin: auto;"> 
                  @if (count($kolo) == 0) 
                  <div class="circle"> 
                    <p class="label">1</p> 
                    <p class="title">Kolokium</p> 
                  </div> 
                  @else 
                    @if ($kolo[$no] == 0) 
                    <div class="circle"> 
                      <p class="label">1</p> 
                      <p class="title">Kolokium</p> 
                    </div> 
                    @else 
                    <div class="circle done"> 
                      <p class="label"><i class="fas fa-check"></i></p> 
                      <p class="title">Kolokium</p> 
                    </div> 
                    @endif                           
                  @endif 
 
                  @if (count($semi) == 0) 
                  <span class="bar"></span> 
                  <div class="circle"> 
                    <p class="label">2</p> 
                    <p class="title">Seminar</p> 
                  </div> 
                  @else 
                    @if ($semi[$no] == 0) 
                    <span class="bar"></span> 
                    <div class="circle"> 
                      <p class="label">2</p>
                      <p class="title">Seminar</p> 
                    </div> 
                    @else 
                    <span class="bar"></span> 
                    <div class="circle done"> 
                      <p class="label"><i class="fas fa-check"></i></p> 
                      <p class="title">Seminar</p> 
                    </div> 
                    @endif                           
                  @endif 
 
                  @if (count($sida) == 0) 
                  <span class="bar"></span> 
                  <div class="circle"> 
                    <p class="label">3</p> 
                    <p class="title">Sidang</p> 
                  </div> 
                  @else 
                    @if ($sida[$no] == 0) 
                    <span class="bar"></span> 
                    <div class="circle"> 
                      <p class="label">3</p> 
                      <p class="title">Sidang</p> 
                    </div> 
                    @else 
                    <span class="bar"></span> 
                    <div class="circle done"> 
                      <p class="label"><i class="fas fa-check"></i></p> 
                      <p class="title">Sidang</p> 
                    </div> 
                    @endif                           
                  @endif 
                </div> 
              </div> 
            </div> 
            <?php $no += 1; ?> 
            @endforeach 
          </div> 
          <!-- ./card-body --> 
 
        </div> 
        <!-- /.card --> 
      </div> 
      <!-- /.col --> 
    </div> 
 
    <div class="row"> 
      <div class="col-md-12"> 
        <div class="card"> 
          <div class="card-body"> 
            <div class="row"> 
              <div class="col-md-12 mb-5"> 
                <small>*Klik profile jika ingin melihat detail progress mahasiswa</small>
                <br><br>
                <div class="title text-center" style="font-weight: 600;">PROGRESS MAHASISWA BIMBINGAN KEDUA</div> 
              </div> 
            </div> 
            <?php 
              $no = 0;   
            ?> 
            @foreach ($mhs2 as $bimbingan) 
            <div class="row pb-2"> 
              <div class="col-md-1"></div> 
              <div class="col-md-2 mb-4 text-center"> 
                <a data-toggle="modal" data-target="#Status-{{$bimbingan->id}}" title="Status Mahasiswa" type="button"> 
                  <i class="fa fa-user-circle fa-4x text-inverse"></i> 
                </a> 
              </div> 
              <div class="col-md-4 mb-4"> 
                <h1 style="font-size: 16px; font-weight: 600;">{{$bimbingan->nim}}</h1> 
                <h1 style="font-size: 14px;">{{$bimbingan->nama}}</h1> 
                <h1 style="font-size: 14px;">{{$bimbingan->getProdi->nama}}</h1> 
              </div> 
              <div class="col-md-5 mb-4"> 
                <div class="progress" style="background-color: white; margin: auto;"> 
                  @if (count($kolo) == 0) 
                  <div class="circle"> 
                    <p class="label">1</p> 
                    <p class="title">Kolokium</p> 
                  </div> 
                  @else 
                    @if ($kolo[$no] == 0) 
                    <div class="circle"> 
                      <p class="label">1</p> 
                      <p class="title">Kolokium</p> 
                    </div> 
                    @else 
                    <div class="circle done"> 
                      <p class="label"><i class="fas fa-check"></i></p> 
                      <p class="title">Kolokium</p> 
                    </div> 
                    @endif                           
                  @endif 
 
                  @if (count($semi) == 0) 
                  <span class="bar"></span> 
                  <div class="circle"> 
                    <p class="label">2</p> 
                    <p class="title">Seminar</p> 
                  </div> 
                  @else 
                    @if ($semi[$no] == 0) 
                    <span class="bar"></span> 
                    <div class="circle"> 
                      <p class="label">2</p>
                      <p class="title">Seminar</p> 
                    </div> 
                    @else 
                    <span class="bar"></span> 
                    <div class="circle done"> 
                      <p class="label"><i class="fas fa-check"></i></p> 
                      <p class="title">Seminar</p> 
                    </div> 
                    @endif                           
                  @endif 
 
                  @if (count($sida) == 0) 
                  <span class="bar"></span> 
                  <div class="circle"> 
                    <p class="label">3</p> 
                    <p class="title">Sidang</p> 
                  </div> 
                  @else 
                    @if ($sida[$no] == 0) 
                    <span class="bar"></span> 
                    <div class="circle"> 
                      <p class="label">3</p> 
                      <p class="title">Sidang</p> 
                    </div> 
                    @else 
                    <span class="bar"></span> 
                    <div class="circle done"> 
                      <p class="label"><i class="fas fa-check"></i></p> 
                      <p class="title">Sidang</p> 
                    </div> 
                    @endif                           
                  @endif 
                </div> 
              </div> 
            </div> 
            <?php $no += 1; ?> 
            @endforeach 
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
 
 
{{--@if(is_null($mhs) == 0) 
@foreach ($mhs as $bimbingan) 
@include('modal.status-mhs') 
@endforeach 
@endif  


@if(is_null($mhs2) == 0) 
@foreach ($mhs2 as $bimbingan) 
@include('modal.status-mhs') 
@endforeach 
@endif  --}}
 
@endsection