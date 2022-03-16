<div class="modal fade" id="Status-{{$data->id_mhs}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1"> 
  <div class="modal-dialog modal-lg" role="document"> 
    <div class="modal-content"> 
      <div class="modal-header"> 
        <a type="button" class="btn btn-dark btn-icon btn-sm" style="cursor: default; font-size: 12px;">#Detail Kartu Bimbingan {{$data->getMahasiswa->nama}}</a> 
      </div> 
      <div class="modal-body text-justify"> 
       
          <table class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600; text-align: center;"> 
              <thead> 
                <th width="5%">Pertemuan</th>
                <th width="25%">Tanggal</th> 
                <th>Kegiatan</th> 
              </thead> 
              <tbody> 
                @for ($j = 0; $j < count($file); $j++)
                  @if ($file[$j][0] == $data->id_mhs) 

                  @for ($i = 0; $i < count($file[$j][1]); $i++) 
                    <tr> 
                      <td>{{$i+1}}</td>
                      <td><p style="font-size: 13px;">{{ Carbon\Carbon::parse($file[$j][1][$i][3])->translatedFormat('l, d F Y'); }}</p></td> 
                      <td style="text-align: left;">{{ $file[$j][1][$i][4] }}</td>
                    </tr> 
                    @endfor                      
                  @endif 
                @endfor
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