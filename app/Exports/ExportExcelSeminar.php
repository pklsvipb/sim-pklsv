<?php

namespace App\Exports;

use App\Models\tb_daftar;
use App\Models\tb_mahasiswa;
use App\Models\tb_nilai_bap;
use App\Models\tb_nilai_forum;
use App\Models\tb_nilai_pembahas;
use App\Models\tb_panitia;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportExcelSeminar implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $user = Auth::user();
        $panitia = tb_panitia::where('id', $user->id_user)->first();
        $mahas   = tb_mahasiswa::where('id_prodi', $panitia->id_prodi)->get();
        $final = [];
        $no = 1;

        foreach ($mahas as $mhs) {
            $daftar  = tb_daftar::where('ket', 'sm')->where('id_mhs', $mhs->id)->first();

            if ($daftar != null) {
                $dospem = tb_nilai_bap::where('id_mhs', $mhs->id)->where('id_dosen', $daftar->id_dosen)->where('ket', 'sm')->where('status', 'dosen')->first();
                $mode   = tb_nilai_bap::where('id_mhs', $mhs->id)->where('id_dosen', $daftar->id_moderator)->where('ket', 'sm')->where('status', 'moderator')->first();

                if ($dospem != null) {
                    $bap_dospem = round(($dospem->nilai1 + $dospem->nilai2 + $dospem->nilai3) / 3, 2);
                } else {
                    $bap_dospem = '0';
                }

                if ($mode != null) {
                    $bap_mode = round(($mode->nilai1 + $mode->nilai2 + $mode->nilai3) / 3, 2);
                } else {
                    $bap_mode = '0';
                }
            } else {
                $bap_dospem = '0';
                $bap_mode   = '0';
            }

            $pembahas   = tb_nilai_pembahas::where('id_pembahas', $mhs->id)->first();
            if ($pembahas != null) {
                $nilai_pembahas = $pembahas->nilai_pembahas;
            } else {
                $nilai_pembahas = '0';
            }

            $forums     = tb_nilai_forum::where('id_mhs', $mhs->id)->get();
            if (count($forums) == 0) {
                $nilai_forum = '0';
            } else {
                $fm = tb_nilai_forum::where('id_mhs', $mhs->id)->avg('nilai');
                $nilai_forum = round($fm, 2);
            }

            $final[] = array($no, $mhs->nama, $mhs->nim, $bap_dospem, $bap_mode, $nilai_pembahas, $nilai_forum);
            $no += 1;
        }

        return collect($final);
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'NIM',
            'BAP Dospem',
            'BAP Moderator',
            'Pembahas',
            'Forum'
        ];
    }

    public function map($final): array
    {
        return [
            $final[0],
            $final[1],
            $final[2],
            $final[3],
            $final[4],
            $final[5],
            $final[6],
        ];
    }
}
