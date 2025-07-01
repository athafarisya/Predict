<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserImport;
use App\Exports\UserTemplateExport;
use Illuminate\Support\Facades\Validator;

class DataUserController extends Controller
{
    public function index()
    {
        $dataUser = User::all();
        return view('admin.dataUser.dataUser', compact('dataUser'));
    }

    public function saveUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:15|unique:users,username,' . $request->id,
            'role' => 'required|in:admin,mahasiswa',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->id) {
            // Update
            $user = User::findOrFail($request->id);
            if ($request->role == 'mahasiswa') {
                $password = (Hash::make($request->username));
            } else {
                $password = (Hash::make('admin12345'));
            }
            $user->update([
                'username' => $request->username,
                'role' => $request->role,
                'status' => $request->status,
                'password' => $password,
            ]);
            $message = 'User berhasil diperbarui.';
        } else {
            if ($request->role == 'mahasiswa') {
                $password = (Hash::make($request->username));
            } else {
                $password = (Hash::make('admin12345'));
            }
            User::create([
                'username' => $request->username,
                'role' => $request->role,
                'status' => $request->status,
                'password' => $password,
            ]);
            $message = 'User berhasil ditambahkan.';
        }

        return redirect()->route('data-user')->with('success', $message);
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('data-user')->with('success', 'User berhasil dihapus.');
    }

    public function importUser(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new UserImport, $request->file('file'));

        return redirect()->route('data-user')->with('success', 'Data berhasil diimpor.');
    }

    public function downloadTemplate()
    {
        return Excel::download(new UserTemplateExport, 'template_user.xlsx');
    }
}
