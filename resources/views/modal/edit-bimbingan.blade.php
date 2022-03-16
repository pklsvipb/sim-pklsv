<div class="modal fade" id="Edit-Bimbingan-{{$bimbingan->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
    <div class="modal-dialog" role="document">
        <form action="{{ url('/mahasiswa/edit/kartu-bimbingan') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <a type="button" class="btn btn-dark btn-icon btn-sm" style="cursor: default; font-size: 12px;">#Edit Kartu Bimbingan TA</a>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" value="{{$bimbingan->id}}">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tanggal <i style="color: red">*</i></label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="tanggal" value="{{$bimbingan->tanggal}}" required="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kegiatan <i style="color: red">*</i></label>
                                <div class="col-sm-8">
                                    <textarea name="kegiatan" rows="3" cols="50" class="form-control">{{$bimbingan->kegiatan}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save fa-sm"></i>&nbsp; Simpan</button>
                    <a type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>