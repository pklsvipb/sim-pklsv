<div class="modal fade" id="Upload-Periodik" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
    <div class="modal-dialog" role="document">
        <form action="{{ url('/mahasiswa/upload/laporan-periodik') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <a type="button" class="btn btn-dark btn-icon btn-sm" style="cursor: default; font-size: 12px;">#Upload Laporan Periodik Yang Ditandatangani</a>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <p style="font-size: 12px;">(Upload ulang akan me-replace file sebelumnya)</p>
                                    <input type="file" name="upload" accept=".pdf" data-allowed-file-extensions='["pdf", "docx"]' id="input-file-now" class="dropify" data-max-file-size="5000K" />
                                    <p class="help-block" style="font-size: 12px;">Max Filesize 5 MB (PDF)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-upload fa-sm"></i>&nbsp; Upload</button>
                    <a type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>