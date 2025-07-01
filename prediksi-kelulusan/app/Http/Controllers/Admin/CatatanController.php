<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catatan;

class CatatanController extends Controller
{
    public function index()
    {
        $catatans = Catatan::latest()->get();//untuk mengambil semua catatan yang terbaru
        return view('admin.dataPrediksiKelulusan.dataPrediksi', compact('catatans'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'hasil_prediksi' => 'required',
            'catatan' => 'required',
        ]);

        // Simpan catatan baru (bisa juga update jika sudah ada catatan sebelumnya)
        Catatan::updateOrCreate(
            ['nim' => $request->nim],
            [
                'nama' => $request->nama,
                'hasil_prediksi' => $request->hasil_prediksi,
                'catatan' => $request->catatan,
            ]
        );

        return redirect()->back()->with('success', 'Catatan berhasil disimpan.');
    }
}

