<div class="modal fade" id="Import-Mahasiswa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <a type="button" class="btn btn-dark btn-icon btn-sm" style="cursor: default; font-size: 12px;">#Import Excel</a>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                        <form action="{{ url('/admin/mahasiswa/import') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pilih File </label>
                                <div class="col-md-8">
                                    <input type="file" name="excel" maxlength="128" class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 control-label"></label>
                                <div class="col-md-8">
                                    <p style="font-size: 12px;">* PDF. Max size 500 KB</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-8 mt-1">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit fa-sm"></i>&nbsp; Upload</button>
                                    <a type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Cancel</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>