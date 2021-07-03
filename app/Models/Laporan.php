<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_jurnal',
        'kegiatan',
        'keterangan',
        'waktu',
        'tanggal'
    ];

    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class, 'id_jurnal');
    }
}
