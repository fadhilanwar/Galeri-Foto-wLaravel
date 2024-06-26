<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Album extends Model
{
    use HasFactory;

    protected $table = 'album';

    protected $fillable = [
        'nama_album', 'deskripsi', 'tanggal_dibuat', 'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
