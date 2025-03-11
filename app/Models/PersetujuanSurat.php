<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersetujuanSurat extends Model
{
    use HasFactory;

    public function pengajuanSurat()
    {
        return $this->belongsTo(PengajuanSurat::class);
    }

    public function ketuaProdi()
    {
        return $this->belongsTo(User::class, 'ketua_program_studi_id');
    }
}
