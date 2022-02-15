<div class="modal fade" id="Add-Mahasiswa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <a type="button" class="btn btn-dark btn-icon btn-sm" style="cursor: default; font-size: 12px;">#Form Tambah Mahasiswa</a>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                        <form action="{{ url('/admin/mahasiswa/add') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Lengkap <i style="color: red">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan nama lengkap" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NIM <i style="color: red">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nim" id="nim" placeholder="Masukan NIM" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Program Studi <i style="color: red">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-control select2 select2-hidden-accessible" name="prodi" style="width: 100%;">
                                        <option selected="selected" disabled>...</option>
                                        <option value="Manajemen Informatika">Manajemen Informatika</option>
                                        <option value="Teknik Komputer">Teknik Komputer</option>
                                        <option value="Ekowisata">Ekowisata</option>
                                        <option value="Teknologi Produksi dan Manajemen Perkebunan">Teknologi Produksi dan Manajemen Perkebunan</option>
                                        <option value="Teknologi Produki dan Pengembangan Masyarkat Pertanian">Teknologi Produki dan Pengembangan Masyarkat Pertanian</option>
                                        <option value="Analisis Kimia">Analisis Kimia</option>
                                        <option value="Teknik dan Manajemen Lingkungan">Teknik dan Manajemen Lingkungan</option>
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
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save fa-sm"></i>&nbsp; Simpan</button>
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