<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submitions extends Model
{
    use HasFactory;
    protected $table = 'submitions';
    protected $fillable = [
        'name_student',
        'title',
        'file',
        'comment'
    ];

    public function tugas()
    {
        return $this->hasOne(Tugas::class, 'id_assigment');
    }
}
