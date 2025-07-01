<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solusi;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class SolusiController extends Controller
{
    public function index()
    {
        return view('admin.solusiKelulusan.solusiKelulusan');
    }

    public function servesideTable(Request $request)
    {
        try {
            $solusi = Solusi::query();

            return DataTables::of($solusi)
                ->addIndexColumn()
                ->addColumn('aksi', function ($row) {
                    return '<div>
                        <button class="btn btn-primary btn-sm" onclick="editModal(this)" data-id="' . $row->id_solusi . '">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteModal(this)" data-id="' . $row->id_solusi . '">Hapus</button>
                    </div>';
                })
                ->rawColumns(['aksi'])
                ->make(true);
        } catch (\Exception $e) {
            Log::error('DataTables Error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to load data.'], 500);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'waktu_kelulusan' => 'required|string|max:255',
            'solusi' => 'required|string|max:255',
        ]);

        Solusi::create($validated);

        return response()->json(['message' => 'Data berhasil disimpan']);
    }

    public function show($id)
    {
        $solusi = Solusi::findOrFail($id);

        return response()->json(['data' => $solusi]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'waktu_kelulusan' => 'required|string|max:255',
            'solusi' => 'required|string|max:255',
        ]);

        $solusi = Solusi::findOrFail($id);
        $solusi->update($validated);

        return response()->json(['message' => 'Data berhasil diperbarui']);
    }

    public function destroy($id)
    {
        $solusi = Solusi::findOrFail($id);
        $solusi->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
