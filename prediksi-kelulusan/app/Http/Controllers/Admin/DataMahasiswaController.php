<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataMahasiswa;
use App\Models\PrediksiKelulusan;
use App\Imports\MahasiswaImport;
use App\Exports\MahasiswaExport;
use App\Exports\MahasiswaTemplateExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class DataMahasiswaController extends Controller
{
    public function index()
    {
        $dataMahasiswa = DataMahasiswa::with(['prediksiKelulusan' => function ($query) {
            $query->latest('tanggal_prediksi')->limit(1);
        }])->get();

        return view('admin.dataMahasiswa.dataMahasiswa', compact('dataMahasiswa'));
    }

    public function saveMahasiswa(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nim' => 'required|string|max:15|unique:data_mahasiswa,nim,' . $request->id,
            'umur' => 'required|integer',
            'jk' => 'required|string|max:10',
            'status_bekerja' => 'required|string|max:10',
            'kegiatan_organisasi' => 'nullable|string|max:50',
            'masa_studi' => 'nullable|integer',

            // IPS 1-4 wajib
            'ips1' => 'nullable|numeric|between:0,4.00',
            'ips2' => 'nullable|numeric|between:0,4.00',
            'ips3' => 'nullable|numeric|between:0,4.00',
            'ips4' => 'nullable|numeric|between:0,4.00',

            // IPS 5-7 opsional
            'ips5' => 'nullable|numeric|between:0,4.00',
            'ips6' => 'nullable|numeric|between:0,4.00',
            'ips7' => 'nullable|numeric|between:0,4.00',
        ]);

        if ($request->id) {
            $mahasiswa = DataMahasiswa::findOrFail($request->id);
            $mahasiswa->update($request->all());
            $message = 'Data mahasiswa berhasil diperbarui.';
        } else {
            DataMahasiswa::create($request->all());
            $message = 'Data mahasiswa berhasil disimpan.';
        }

        return redirect()->back()->with('success', $message);
    }

    public function predictAll()
    {
        $uri = env('ML_SERVICE_BASE_URL') . '/predict';

        $mahasiswaList = DataMahasiswa::all();

        foreach ($mahasiswaList as $mahasiswa) {
            $response = Http::post($uri, [
                "ips1" => $mahasiswa->ips1 ?? 0,
                "ips2" => $mahasiswa->ips2 ?? 0,
                "ips3" => $mahasiswa->ips3 ?? 0,
                "ips4" => $mahasiswa->ips4 ?? 0,
                "ips5" => $mahasiswa->ips5 ?? 0,
                "ips6" => $mahasiswa->ips6 ?? 0,
                "ips7" => $mahasiswa->ips7 ?? 0,
                "masa_studi" => (int) ($mahasiswa->masa_studi ?? 0),
            ]);

            $hasil_predict = $response->json()['result']['prediction'];

            PrediksiKelulusan::create([
                'mahasiswa_id' => $mahasiswa->id,
                'hasil_prediksi' => $hasil_predict,
                'tanggal_prediksi' => Carbon::now()
            ]);
        }

        return redirect()->back()->with('success', 'Prediksi kelulusan berhasil diperbarui untuk semua mahasiswa.');
    }

    public function deleteMahasiswa($id)
    {
        $mahasiswa = DataMahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->back()->with('success', 'Data mahasiswa berhasil dihapus.');
    }

    public function exportMahasiswa()
    {
        return Excel::download(new MahasiswaExport, 'data_mahasiswa.xlsx');
    }

    public function importMahasiswa(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new MahasiswaImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data mahasiswa berhasil diimpor.');
    }

    public function downloadTemplate()
    {
        return Excel::download(new MahasiswaTemplateExport, 'template_data_mahasiswa.xlsx');
    }
}
