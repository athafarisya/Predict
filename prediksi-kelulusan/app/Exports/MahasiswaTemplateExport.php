<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaTemplateExport implements FromArray, WithHeadings
{
    public function array(): array
    {
        return [
            [
                // 'Budi Santoso', '123456789', '21', 'L', 'SMA Negeri 1', 'Aktif', '5000000',
                // 'BEM', 'Tidak', '3.5', '3.6', '3.7', '3.8', '3.9', '4.0', '4.0'
            ],
        ];
    }

    public function headings(): array
    {
        return [
            'Nama', 'NIM', 'Umur', 'JK', 'status_bekerja', 'Kegiatan_Organisasi', 'masa_studi', 'IPS1', 'IPS2', 'IPS3', 'IPS4', 'IPS5', 'IPS6', 'IPS7'
        ];
    }
}
