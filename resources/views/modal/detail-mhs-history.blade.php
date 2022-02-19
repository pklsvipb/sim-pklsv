<div class="modal fade" id="Detail-History-{{$mhs2[$j][0]}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <a type="button" class="btn btn-dark btn-icon btn-sm" style="cursor: default; font-size: 12px;">#Detail Mahasiswa</a>
      </div>
      <div class="modal-body text-justify">
        <table id="datatable2" class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline collapsed" style="font-size: 12px; font-weight: 400; color: black; width: 100%;" width="100%" role="grid" aria-describedby="data-table_info">
          <tbody>
            <?php
            for ($i = 0; $i < count($listmhs2); $i++) {
              if ($listmhs2[$i][0] == $mhs2[$j][1]) { ?>
                <tr>
                  <td style="text-align: center; width: 30%;">{{$listmhs2[$i][1]}}</td>
                  <td style="text-align: center;">{{$listmhs2[$i][2]}}</td>
                </tr>
            <?php
              }
            } ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-default btn-sm waves-effect waves-light" style="font-size: 11px;" data-dismiss="modal">Kembali</a>
      </div>
    </div>
  </div>
</div>
<!-- </div>  -->