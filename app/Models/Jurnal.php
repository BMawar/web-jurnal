<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;
    protected $table = "jurnals";
    protected $fillable = [
        'id_mapel',
        'kehadiran',
        'materi',
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }
}
