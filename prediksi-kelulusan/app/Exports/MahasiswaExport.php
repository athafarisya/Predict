<?php

namespace App\Exports;

use App\Models\DataMahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return DataMahasiswa::select(
            // 'id', 'nama', 'nim', 'umur', 'jk', 'asal_sekolah', 'jurusan', 'penghasilan_ortu',
            // 'kegiatan_organisasi', 'status_cuti', 'ips1', 'ips2', 'ips3', 'ips4', 'ips5', 'ips6', 'ips7', 'created_at', 'updated_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID', 'Nama', 'NIM', 'Umur', 'Jenis Kelamin', 'Status Bekerja', 'Kegiatan Organisasi', 'Masa Studi', 'IPS1', 'IPS2', 'IPS3', 'IPS4', 'IPS5', 'IPS6', 'IPS7', 'Created At', 'Updated At'
        ];
    }
}
