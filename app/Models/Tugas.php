<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'tugas';

    protected $fillable = [
        'deskripsi',
        'tanggal',
        'duedate',
        'file',
        'id_mapel',
    ];

    public function tugas()
    {
        return $this->belongsTo(Mapel::class);
    }
}
