<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Catatan;

class AdminController extends Controller
{
    public function index()
    {
        // Jumlah seluruh catatan prediksi dari tabel catatans
        $jumlahData = Catatan::count();

        // Jumlah mahasiswa dari tabel data_mahasiswa
        $jumlahMahasiswa = DB::table('data_mahasiswa')->count();

        // Ambil data hasil_prediksi dari prediksi_kelulusan, dikelompokkan berdasarkan tahun dan hasil_prediksi
        $dataPerTahun = DB::table('prediksi_kelulusan')
            ->select(
                DB::raw('YEAR(tanggal_prediksi) as tahun'),
                'hasil_prediksi',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('tahun', 'hasil_prediksi')
            ->orderBy('tahun', 'asc')
            ->get();

        // Format data ke bentuk array per tahun
        $formattedData = [];

        foreach ($dataPerTahun as $item) {
            $tahun = $item->tahun;
            $status = strtolower($item->hasil_prediksi); // "tepat waktu" atau "tidak tepat waktu"

            if (!isset($formattedData[$tahun])) {
                $formattedData[$tahun] = [
                    'tahun' => $tahun,
                    'tepat_waktu' => 0,
                    'tidak_tepat_waktu' => 0
                ];
            }

            if ($status === 'tepat waktu') {
                $formattedData[$tahun]['tepat_waktu'] = $item->total;
            } elseif ($status === 'tidak tepat waktu') {
                $formattedData[$tahun]['tidak_tepat_waktu'] = $item->total;
            }
        }

        // Ubah ke indexed array agar bisa dibaca di view
        $formattedData = array_values($formattedData);

        return view('admin.dashboard', compact(
            'jumlahData',
            'jumlahMahasiswa',
            'formattedData'
        ));
    }
}
