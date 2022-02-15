<div class="modal fade" id="Upload-{{$form->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
    <div class="modal-dialog" role="document">
        <form action="{{ url('/mahasiswa/upload/form/'.$form->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <a type="button" class="btn btn-dark btn-icon btn-sm" style="cursor: default; font-size: 12px;">#Upload Form</a>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="ket" value="{{$form->ket}}">
                                    <input type="file" name="upload" accept=".docx, .pdf" data-allowed-file-extensions='["pdf", "docx"]' id="input-file-now" class="dropify" data-max-file-size="50000K" />
                                    <p class="help-block" style="font-size: 12px;">Max Filesize 50 MB (PDF/DOCX)</p>
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