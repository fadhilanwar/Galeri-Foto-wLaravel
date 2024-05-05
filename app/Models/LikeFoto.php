<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeFoto extends Model
{
    use HasFactory;

    protected $table = 'like_foto';

    protected $fillable = [
        'foto_id', 'user_id', 'tanggal_like'
    ];
}
