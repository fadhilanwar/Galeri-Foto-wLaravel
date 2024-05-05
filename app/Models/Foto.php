<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Album;


class Foto extends Model
{
    use HasFactory;

    protected $table = 'foto';

    protected $fillable = [
        'judul_foto', 
        'deskripsi',
        'tanggal_unggah',
        'lokasi_file',
        'album_id',
        'user_id',
    ];

    public function album() {
        return $this->belongsTo(Album::class);
    }
}
