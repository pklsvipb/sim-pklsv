<div class="modal fade" id="Ulang-{{$daftar->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <a type="button" class="btn btn-danger btn-icon btn-sm" style="cursor: default; font-size: 12px;">#Sidang Ulang</a>
            </div>
            <div class="modal-body text-center">
                <p class="modal-title" id="myModalLabel-1" style="font-size: 15px;">Apakah Anda yakin <b> {{$mahasiswa->nama}} </b> melakukan sidang ulang? </p> <br>
                <form method="POST" action="{{url('/panitia/sidang/sidang-ulang', $daftar->id)}}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-icon btn-md">YES</button>
                </form>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Batal</a>
            </div>
        </div>
    </div>
</div>