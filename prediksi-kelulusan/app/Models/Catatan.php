<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    protected $fillable = ['nim', 'nama', 'hasil_prediksi', 'catatan'];
}
