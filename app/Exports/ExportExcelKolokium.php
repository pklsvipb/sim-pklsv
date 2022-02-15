<?php

namespace App\Exports;

use App\Models\tb_daftar;
use App\Models\tb_mahasiswa;
use App\Models\tb_panitia;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportExcelKolokium implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user = Auth::user();
        $panitia = tb_panitia::where('id', $user->id_user)->first();
        $getData = tb_daftar::where('ket', 'kl')->where('id_prodi', $panitia->id_prodi)->get();
        $final = [];
        $no = 1;

        foreach ($getData as $data){
            $mhs = tb_mahasiswa::where('id', $data->id_mhs)->first();
            $final[] = array($no, $mhs->nim, $mhs->nama, $mhs->kajian ?? '', $data->judul, $data->lokasi, $data->tgl, $mhs->getDospem1->nama ?? '', $mhs->getDospem2->nama ?? '', $data->getModerator->nama ?? '', $mhs->instansi);
            $no += 1;
        }

        return collect($final);
    }

    public function headings(): array
    {
        return [
            'No',
            'Nim', 
            'Nama', 
            'Bidang Kajian', 
            'Judul Kajian', 
            'Nama Instansi',
            'Lokasi PKL', 
            'Tanggal Kolokium', 
            'Pembimbing 1',
            'Pembimbing 2', 
            'Moderator'
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
            $final[10],
            $final[5],
            $final[6],
            $final[7],
            $final[8],
            $final[9],
        ];
    }
}
