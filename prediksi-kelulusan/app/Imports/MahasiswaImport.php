<?php

namespace App\Imports;

use App\Models\DataMahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new DataMahasiswa([
            'nama' => $row['nama'],
            'nim' => $row['nim'],
            'umur' => $row['umur'],
            'jk' => $row['jk'],
            'status_bekerja' => $row['status_bekerja'],
            'kegiatan_organisasi' => $row['kegiatan_organisasi'],
            'masa_studi' => $row['masa_studi'],
            'ips1' => $row['ips1'],
            'ips2' => $row['ips2'],
            'ips3' => $row['ips3'],
            'ips4' => $row['ips4'],
            'ips5' => $row['ips5'],
            'ips6' => $row['ips6'],
            'ips7' => $row['ips7'],
        ]);
    }
}
