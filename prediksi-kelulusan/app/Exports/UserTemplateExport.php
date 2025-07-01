<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserTemplateExport implements FromArray, WithHeadings
{
    public function array(): array
    {
        return [
            // Baris contoh, bisa dihapus kalau tidak mau data sama sekali
            // ['john_doe', 'admin', 'aktif'],
        ];
    }

    public function headings(): array
    {
        return [
            'Username', 'Role', 'Status'
        ];
    }
}
