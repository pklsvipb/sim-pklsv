@extends('layouts.mahasiswa')

@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <!-- <h5 class="card-title">Profile</h5> -->
          <h1 class="card-title" style="font-weight: 600; font-size: 1.2rem;">Reset <small style="font-size: 12px; color: #777;">Password</small></h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">

              <form action="{{ url('/mahasiswa/reset-password/submit') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group row">
                  <label class="col-sm-5 col-form-label">Password Baru</label>
                  <div class="col-sm-2">
                    <input type="password" class="form-control" name="password" id="password" required="">
                    <input type="checkbox" onclick="myFunction()"> &nbsp;<span style="font-size: 12px;">Show Password</span> 
                  </div>
                  <div class="col-sm-2 mt-1">
                    <button type="submit" value="save" class="btn btn-primary btn-sm"><i class="fa fa-save fa-sm"></i>&nbsp; Save</button>
                  </div>
                </div>

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

@push('scripts')
<script>
  function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
@endpush