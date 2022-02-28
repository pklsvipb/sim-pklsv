<div class="modal fade" id="Reset-{{$mhs->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <a type="button" class="btn btn-dark btn-icon btn-sm" style="cursor: default; font-size: 12px;">#Reset Password</a>
            </div>
            <div class="modal-body text-center">
                <p class="modal-title" id="myModalLabel-1" style="font-size: 15px;">Password <b><u>{{ $mhs->nama }}</u></b> akan direset menjadi <b><u>{{ $mhs->nim }}</u></b></p><br>
                <form method="GET" action="{{ url('/panitia/setting/mahasiswa/reset/'.$mhs->nim) }}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-warning btn-icon btn-md">YES</button>
                </form>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Batal</a>
            </div>
        </div>
    </div>
</div>