<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if ($row['role'] == 'mahasiswa') {
            $password = (Hash::make($row['username']));
        } else {
            $password = (Hash::make('admin12345'));
        }
        return new User([
            'username' => $row['username'],
            'role' => $row['role'],
            'status' => $row['status'],
            'password' =>  $password
        ]);
    }
}
