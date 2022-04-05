<div class="modal fade" id="Status-{{$data->id_mhs}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1"> 
  <div class="modal-dialog modal-lg" role="document"> 
    <div class="modal-content"> 
      <div class="modal-header"> 
        <a type="button" class="btn btn-dark btn-icon btn-sm" style="cursor: default; font-size: 12px;">#Detail Kartu Seminar {{$data->getMhs->nama}}</a> 
      </div> 
      <div class="modal-body text-justify"> 
       
          <table class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600; text-align: center;"> 
              <thead> 
                <th width="15%">Tanggal</th> 
                <th width="15%">Waktu</th>
                <th>Nama Pemrasaran</th>
                <th>Nim Pemrasaran</th> 
                <th>Dosen Moderator</th>
                <th>Status</th>
              </thead> 
              <tbody> 
                @for ($j = 0; $j < count($mahasiswa); $j++)
                  @if ($mahasiswa[$j][0] == $data->id_mhs) 

                  @for ($i = 0; $i < count($mahasiswa[$j][1]); $i++) 
                    <tr> 
                      <td>{{ Carbon\Carbon::parse($mahasiswa[$j][1][$i][0])->translatedFormat('l/ d F Y'); }}</td> 
                      <td>{{substr($mahasiswa[$j][1][$i][1],0,5)}}</td>
                      <td style="text-align: left;">{{ $mahasiswa[$j][1][$i][2] }}</td>
                      <td style="text-align: center;">{{ $mahasiswa[$j][1][$i][3] }}</td>
                      <td style="text-align: left;">{{ $mahasiswa[$j][1][$i][4] }}</td>
                      <td>
                        @if ($mahasiswa[$j][1][$i][5] == 0)
                          <span class='badge badge-danger'>Belum diverif</span>
                        @else
                          <span class='badge badge-success'>Sudah ditanda tangan</span>
                        @endif
                      </td>
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