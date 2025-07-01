<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrediksiKelulusan extends Model
{
    use HasFactory;

    protected $table = 'prediksi_kelulusan';

    protected $primaryKey = 'prediksi_id';

    public $timestamps = false;

    protected $fillable = [
        'mahasiswa_id',
        'hasil_prediksi',
        'tanggal_prediksi',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(DataMahasiswa::class, 'mahasiswa_id', 'id');
    }
}
