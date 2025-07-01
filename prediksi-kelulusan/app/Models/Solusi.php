<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solusi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_solusi';
    protected $table = 'solusi';
    protected $fillable = ['waktu_kelulusan', 'solusi'];
}
