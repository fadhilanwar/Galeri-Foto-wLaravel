<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar_foto extends Model
{
    use HasFactory;

    protected $table = 'komentar_foto';

    protected $fillable = [
        'foto_id', 'user_id', 'isi_komentar'
    ];
}
