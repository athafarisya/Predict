<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPredict extends Model
{
    use HasFactory;

    protected $table = 'history_predict';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'nim',
        'umur',
        'masa_studi',
        'status_kegiatan',
        'status_bekerja',
        'ips1',
        'ips2',
        'ips3',
        'ips4',
        'ips5',
        'ips6',
        'ips7',
        'ips8',
        'hasil_prediksi',
        'catatan',
        'tanggal_prediksi',
        'probability'
    ];

    protected $casts = [
        'ips1' => 'float',
        'ips2' => 'float',
        'ips3' => 'float',
        'ips4' => 'float',
        'ips5' => 'float',
        'ips6' => 'float',
        'ips7' => 'float',
        'ips8' => 'float',
        'tanggal_prediksi' => 'datetime'
    ];
}
