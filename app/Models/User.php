<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'password', 'role_id', 'program_studi_id'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    public function pengajuanSurat()
    {
        return $this->hasMany(PengajuanSurat::class, 'mahasiswa_id');
    }

    public function persetujuanSurat()
    {
        return $this->hasMany(PersetujuanSurat::class, 'ketua_program_studi_id');
    }
}
