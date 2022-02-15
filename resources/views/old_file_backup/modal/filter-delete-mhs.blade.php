<div class="modal fade" id="Filter-Delete-Mahasiswa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <a type="button" class="btn btn-danger btn-icon btn-sm" style="cursor: default; font-size: 12px;">#Form Filter Delete</a>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                        <form action="{{ url('/admin/mahasiswa/filter-delete') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Program Studi <i style="color: red">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-control select2 select2-hidden-accessible" name="prodi" style="width: 100%;">
                                        <option selected="selected" disabled>...</option>
                                        <option value="Manajemen Informatika">Manajemen Informatika</option>
                                        <option value="Teknik Komputer">Teknik Komputer</option>
                                        <option value="Komunikasi">Komunikasi</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kelas <i style="color: red">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-control select2 select2-hidden-accessible" name="kelas" style="width: 100%;">
                                        <option selected="selected" value="">...</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Angkatan <i style="color: red">*</i></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="angkatan" name="angkatan" placeholder="Masukan angkatan" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label"></div>
                                <div class="col-sm-8 mt-3">
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i>&nbsp; Delete</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Batal</a>
            </div>
        </div>
    </div>
</div>