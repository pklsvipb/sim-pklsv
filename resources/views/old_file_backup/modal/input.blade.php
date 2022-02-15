<div class="row">
  <div class="modal fade" role="dialog" id="input" data-backdrop="false">
    <div class="modal-dialog modal-lg" role="document">
      <form method="POST" action="{{ url('/mahasiswa/profile/submit/') }}">
        {{ csrf_field() }}
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" style="font-size: 16px; font-weight: 800; ">Lengkapi Profile</h4>
          </div>
          <div class="modal-body">
            <table class="table table-hover" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;">
              <tbody>
                @foreach($datas as $data)
                <tr>
                  <td width="400px" style="border-top: none;">Nama</td>
                  <td style="border-top: none;">
                    <input type="text" class="form-control" value="{{$data->name ?? ''}}" readonly>
                  </td>
                </tr>
                <tr>
                  <td width="400px">NIM</td>
                  <td>
                    <input type="text" class="form-control" value="{{$data->username ?? ''}}" readonly>
                  </td>
                </tr>
                <tr>
                  <td width="400px">Program Studi <i style="color: red">*</i></td>
                  <td>
                    <input type="text" class="form-control" value="{{$data->prodi ?? ''}}" readonly>
                  </td>
                </tr>
                <tr>
                  <td width="400px">Kelas <i style="color: red">*</i></td>
                  <td>
                    <select class="form-control select2" name="kelas" required>
                      <option selected="selected" value="">...</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td width="400px">Nomer Kelompok <i style="color: red">*</i></td>
                  <td>
                    <input type="number" name="nomor" class="form-control" required="">
                  </td>
                </tr>
                <tr>
                  <td width="400px">Jumlah Anggota Kelompok <i style="color: red">*</i></td>
                  <td>
                    <input type="number" name="jumlah" class="form-control" required="">
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-default btn-sm waves-effect waves-light">Kirim</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>