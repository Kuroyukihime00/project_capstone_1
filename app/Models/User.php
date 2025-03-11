<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable; // Tambahkan ini
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Perbaikan: Tutup array dengan kurung ]
    protected $fillable = [
        'name',  
        'email',
        'password',
        'program_studi_id',  
        'role',
    ];

    // Relasi dengan tabel program_studis
    public function programStudi(): BelongsTo
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    // Relasi dengan tabel pengajuan_surats
    public function pengajuanSurat(): HasMany
    {
        return $this->hasMany(PengajuanSurat::class, 'mahasiswa_id');
    }

    // Relasi dengan tabel persetujuan_surats
    public function persetujuanSurat(): HasMany
    {
        return $this->hasMany(PersetujuanSurat::class, 'ketua_program_studi_id');
    }
}
