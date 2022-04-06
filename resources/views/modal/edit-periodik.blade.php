<div class="modal fade" id="Edit-Periodik-{{$periodik[$j][0]}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
    <div class="modal-dialog" role="document">
        <form action="{{ url('/mahasiswa/edit/laporan-periodik') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <a type="button" class="btn btn-dark btn-icon btn-sm" style="cursor: default; font-size: 12px;">#Edit Laporan Periodik</a>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" value="{{$periodik[$j][0]}}">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tanggal <i style="color: red">*</i></label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="tanggal" value="{{$periodik[$j][3]}}" required="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Informasi <i style="color: red">*</i></label>
                                <div class="col-sm-8">
                                    <textarea name="informasi" rows="3" cols="50" class="form-control">{{$periodik[$j][4]}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kendala <i style="color: red">*</i></label>
                                <div class="col-sm-8">
                                    <textarea name="kendala" rows="3" cols="50" class="form-control">{{$periodik[$j][5]}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Catatan <i style="color: red">*</i></label>
                                <div class="col-sm-8">
                                    <textarea name="catatan" rows="3" cols="50" class="form-control">{{$periodik[$j][6]}}</textarea>
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