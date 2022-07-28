<?php

namespace App\Exports;

use App\Models\tb_daftar;
use App\Models\tb_form_025;
use App\Models\tb_mahasiswa;
use App\Models\tb_nilai_bap;
use App\Models\tb_panitia;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportExcelSidang implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
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
            $daftar  = tb_daftar::where('ket', 'sd')->where('id_mhs', $mhs->id)->first();

            if ($daftar != null) {
                $dospem = tb_nilai_bap::where('id_mhs', $mhs->id)->where('id_dosen', $daftar->id_dosen)->where('ket', 'sd')->where('status', 'dosen')->first();
                $dosji  = tb_nilai_bap::where('id_mhs', $mhs->id)->where('id_dosen', $daftar->id_dosji)->where('ket', 'sd')->where('status', 'moderator')->first();

                if ($dospem != null) {
                    $bap_dospem = round(($dospem->nilai1 + $dospem->nilai2 + $dospem->nilai3) / 3, 2);
                    $dospem = $daftar->getDosen->nama;
                } else {
                    $bap_dospem = '0';
                    $dospem = '';
                }

                if ($dosji != null) {
                    $bap_dosji = round(($dosji->nilai1 + $dosji->nilai2 + $dosji->nilai3) / 3, 2);
                    $dosji = $daftar->getDosji->nama;
                } else {
                    $bap_dosji = '0';
                    $dosji = '';
                }

                $ta   = tb_form_025::where('id_mhs', $mhs->id)->where('id_dosen', $daftar->id_dosen)->first();

                if ($ta != null) {
                    $nilai_ta = round(($ta->nilai1 + $ta->nilai2 + $ta->nilai3) / 3, 2);
                    $nilai_jurnal = $ta->nilai_jurnal;
                } else {
                    $nilai_ta = '0';
                    $nilai_jurnal = '0';
                }
            } else {
                $bap_dospem = '0';
                $bap_dosji   = '0';
                $nilai_ta = '0';
                $nilai_jurnal = '0';
                $dospem = '';
                $dosji = '';
            }

            $final[] = array($no, $mhs->nama, $mhs->nim, $bap_dospem, $bap_dosji, $nilai_ta, $nilai_jurnal, $daftar->tgl, $daftar->waktu, $dospem, $dosji);
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
            'BAP Dosji',
            'Laporan Akhir',
            'Jurnal Harian',
            'Tanggal Sidang',
            'Waktu Sidang',
            'Dosen Pembimbing',
            'Dosen Penguji'
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
            $final[7],
            $final[8],
            $final[9],
            $final[10],
        ];
    }
}
