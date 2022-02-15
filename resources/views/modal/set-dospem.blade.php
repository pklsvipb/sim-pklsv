<div class="modal fade" id="Set-{{str_replace([' ', ',', '.', '&', '-', '(', ')'], '_', $kelompok[$j][0])}}" tabindex="" role="dialog" aria-labelledby="myModalLabel-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <a type="button" class="btn btn-danger btn-icon btn-sm" style="cursor: default; font-size: 12px;">#Form Set Dospem Kelompok {{$kelompok[$j][0]}}</a>
            </div>

            <form action="{{url('/panitia/set-pembimbing/submit', $kelompok[$j][0])}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Pilih Dosen Pembimbing 1<i style="color: red">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-control select2 select2-hidden-accessible" name="dospem1" style="width: 100%;" required>
                                        <option selected="selected" value="" disabled>...</option>
                                        @foreach($dosen as $dsn)
                                        @if ($dsn->nama == $kelompok[$j][1])
                                        <option selected value="{{$dsn->id}}">{{$dsn->nip}} - {{$dsn->nama}}</option>
                                        @else
                                        <option value="{{$dsn->id}}">{{$dsn->nip}} - {{$dsn->nama}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Pilih Dosen Pembimbing 2</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2 select2-hidden-accessible" name="dospem2" style="width: 100%;">
                                        <option selected="selected" disabled>Dospem Kedua Optional</option>
                                        @foreach($dosen as $dsn)
                                        @if ($dsn->nama == $kelompok[$j][2])
                                        <option selected value="{{$dsn->id}}">{{$dsn->nip}} - {{$dsn->nama}}</option>
                                        @else
                                        <option value="{{$dsn->id}}">{{$dsn->nip}} - {{$dsn->nama}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default btn-sm waves-effect waves-light">Kirim</button>
                    <a type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>