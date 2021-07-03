<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Jurnal extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'tanggal'
    ];

    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'id_jurnal');
    }

    // public function show_pdf()
    // {
    //     if (Storage::has($this->judul . '.pdf')) {
    //         return asset('storage/' . $this->judul . '.pdf');
    //     }
    // }
}
