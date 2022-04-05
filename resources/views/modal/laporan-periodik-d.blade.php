<div class="modal fade" id="Status-{{$getmhs[$h][1]}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <a type="button" class="btn btn-dark btn-icon btn-sm" style="cursor: default; font-size: 12px;">#Detail Laporan Periodik {{$getmhs[$h][2]}}</a>
      </div>
      <div class="modal-body text-justify">

        <?php for ($i = 0; $i < count($periode); $i++) {
          if ($periode[$i][0] == $getmhs[$h][1]) {
        ?>
            <table class="table table-bordered" cellspacing="0" cellpadding="3" style="font-size: .875rem; font-weight: 600; margin: 0px 0px 50px 0px; text-align: center;">
              <thead>
                <tr>
                  <th colspan="5" style="font-weight: 900; padding: 5px; background: #02F0F6;">Periode</th>
                </tr>
                <tr>
                  <td colspan="5" style="font-size: 12px; text-align:center;">{{ Carbon\Carbon::parse($periode[$i][1])->translatedFormat('l, d F Y'); }} / {{ Carbon\Carbon::parse($periode[$i][2])->translatedFormat('l, d F Y'); }}</td>
                </tr>
                <tr>
                  <th width="15%" style="font-weight: 900;">Tanggal</th>
                  <th width="30%" style="font-weight: 900;">Informasi yang diperoleh</th>
                  <th width="30%" style="font-weight: 900;">Masalah/Kendala</th>
                  <th width="25%" style="font-weight: 900;">Catatan Khusus</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($j = 0; $j < count($periodik); $j++) {
                  if ($periodik[$j][1] == $getmhs[$h][1]) {
                ?>
                    @if($periode[$i][1] == $periodik[$j][7] && $periode[$i][2] == $periodik[$j][8])
                    <tr>
                      <td style="font-size: 12px; text-align:center;">{{ Carbon\Carbon::parse($periodik[$j][3])->translatedFormat('l, d F Y'); }}</td>
                      <td style="font-size: 12px; text-align:left;">{{ $periodik[$j][4] }}</td>
                      <td style="font-size: 12px; text-align:left;">{{ $periodik[$j][5] }}</td>
                      <td style="font-size: 12px; text-align:left;">{{ $periodik[$j][6] }}</td>
                    </tr>
                    @endif
                <?php }
                } ?>
              </tbody>
            </table>
        <?php }
        } ?>

      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-default btn-sm waves-effect waves-light" style="font-size: 11px;" data-dismiss="modal">Kembali</a>
      </div>
    </div>
  </div>
</div>
<!-- </div>  -->