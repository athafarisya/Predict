<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\DataMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Solusi;
use App\Models\HistoryPredict;

class PrediksiController extends Controller
{
    public function index()
    {
        $nim = session('username');
        $mahasiswa = DataMahasiswa::where('nim', $nim)->first();

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }
        return view('mahasiswa.prediksi', compact('mahasiswa'));
    }

    public function predict(Request $request)
    {
        $uri = env('ML_SERVICE_BASE_URL') . '/predict';
        $nim = session('username');
        $nama = DataMahasiswa::where('nim', $nim)->pluck('nama')->first();
        $umur = $request->input('umur');
        $masa_studi = (int) $request->input('masa_studi');
        $status_kegiatan = $request->input('status_kegiatan');
        $status_bekerja = $request->input('status_bekerja');
        // IPS1 - IPS7
        $ips1 = $request->input('ips1');
        $ips2 = $request->input('ips2');
        $ips3 = $request->input('ips3');
        $ips4 = $request->input('ips4');
        $ips5 = $request->filled('ips5') ? $request->input('ips5') : 0.0;
        $ips6 = $request->filled('ips6') ? $request->input('ips6') : 0.0;
        $ips7 = $request->filled('ips7') ? $request->input('ips7') : 0.0;

        // Kirim data ke model Flask
        $response = Http::post($uri, [
            "ips1" => $ips1,
            "ips2" => $ips2,
            "ips3" => $ips3,
            "ips4" => $ips4,
            "ips5" => $ips5,
            "ips6" => $ips6,
            "ips7" => $ips7,
            "masa_studi" => $masa_studi
        ]);

        if ($response->failed()) {
            $statusCode = $response->status();
            $errorBody = $response->body(); 
            return redirect()
                ->back()
                ->with('error', "Silakan isi nilai IPS dari semester 1 sampai semester 4 terlebih dahulu.");
        }

        $solusi = new Solusi();
        $hasil_predict = $response->json()['result']['prediction'];
        $probability = $response->json()['result']['probability'];
        $hasilPencarian = $solusi->where('waktu_kelulusan', $hasil_predict)->get();
        $catatan = implode(', ', $hasilPencarian->pluck('solusi')->toArray());

        // Simpan ke history
        HistoryPredict::updateOrCreate(
            ['nim' => $nim],
            [
                'nama' => $nama,
                'umur' => $umur,
                'masa_studi' => $masa_studi,
                'status_kegiatan' => $status_kegiatan,
                'status_bekerja' => $status_bekerja,
                'ips1' => $ips1,
                'ips2' => $ips2,
                'ips3' => $ips3,
                'ips4' => $ips4,
                'ips5' => $ips5,
                'ips6' => $ips6,
                'ips7' => $ips7,
                'hasil_prediksi' => $hasil_predict,
                'catatan' => $catatan,
                'tanggal_prediksi' => now(),
                'probability' => $probability
            ]
        );

        return redirect()->route('viewPrediction', ['nim' => $nim]);
    }


    public function viewPrediction($nim)
    {
        $history = HistoryPredict::where('nim', $nim)->first();

        if (!$history) {
            return redirect()->back()->with('error', 'Data prediksi tidak ditemukan.');
        }

        return view('mahasiswa.hasil', [
            'result' => [
                'prediction' => $history->hasil_prediksi
            ],
            'input' => $history,
            'catatan' => $history->catatan,
            'probability' => $history->probability
        ]);
    }
}
