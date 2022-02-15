<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class MahasiswaImport implements ToCollection
{
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) 
        {
            $mahasiswa           = new User();
            $mahasiswa->name     = $row[1];
            $mahasiswa->username = $row[2];
            $mahasiswa->password = bcrypt($row[2]);
            $mahasiswa->prodi    = $row[3];
            $mahasiswa->angkatan = $row[4];
            $mahasiswa->save();
    
            $mahasiswa->assignRole('mahasiswa');
        }
    }
}
