<div class="modal fade" id="Status-{{$bimbingan->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1"> 
  <div class="modal-dialog" role="document"> 
    <div class="modal-content"> 
      <div class="modal-header"> 
        <a type="button" class="btn btn-dark btn-icon btn-sm" style="cursor: default; font-size: 12px;">#Detail Progress Mahasiswa {{$bimbingan->nama}}</a> 
      </div> 
      <div class="modal-body text-justify"> 
       
          <table class="table" cellspacing="0" cellpadding="0" style="font-size: .875rem; font-weight: 600;"> 
              <thead> 
                <th>No</th> 
                <th>Nama</th> 
                <th style="text-align: center;">Status</th> 
              </thead> 
              <tbody> 
                <?php $no = 1; 
                $id = 0; ?> 
                @for ($i = 0; $i < count($status); $i++) 

                  @if ($status[$i][0] == $bimbingan->nama) 

                  @for ($j = 0; $j < count($status[$i][1]); $j++) 
                    <tr> 
                      <td>{{ ($j + 1) }}</td> 
                      <td>{{ $get_form[$j] }}</td> 
                       
                        @if($status[$i][1][$j][0] == 0) 
                        <td style="text-align: center;"> 
                          <a type="button" class="btn btn-sm btn-secondary" style="font-size: 11px;" disabled>Belum Upload</a> 
                        </td> 
                        @else 
                 
                          @if($status[$i][1][$j][1] == 1) 
                          <td style="text-align: center;"> 
                            <a type="button" class="btn btn-sm btn-success" style="font-size: 11px;" disabled>Disetujui</a> 
                          </td> 
                          @else 
                 
                            @if($status[$i][1][$j][2] == 0) 
                            <td style="text-align: center;"> 
                              <a type="button" class="btn btn-sm btn-warning" style="font-size: 11px;" disabled>Menunggu</a> 
                            </td> 
                            @elseif($status[$i][1][$j][2] == 1) 
                            <td style="text-align: center;"> 
                              <a type="button" class="btn btn-sm btn-danger" style="font-size: 11px;" disabled>Ditolak</a>
                            </td> 
                            @endif 

                          @endif 
                        @endif 
                    </tr> 
                    <?php $no += 1; 
                    $id += 1; ?> 
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