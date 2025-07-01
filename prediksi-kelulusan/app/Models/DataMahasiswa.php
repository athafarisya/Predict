<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'data_mahasiswa';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'nim',
        'umur',
        'jk',
        // 'asal_sekolah',
        // 'status_sekolah',
        // 'jurusan',
        'status_bekerja',
        'kegiatan_organisasi',
        'masa_studi',
        'ips1',
        'ips2',
        'ips3',
        'ips4',
        'ips5',
        'ips6',
        'ips7',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'umur' => 'integer',
        'status_bekerja' => 'string',
        'ips1' => 'decimal:2',
        'ips2' => 'decimal:2',
        'ips3' => 'decimal:2',
        'ips4' => 'decimal:2',
        'ips5' => 'decimal:2',
        'ips6' => 'decimal:2',
        'ips7' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function prediksiKelulusan()
    {
        return $this->hasMany(PrediksiKelulusan::class, 'mahasiswa_id', 'id');
    }

}
