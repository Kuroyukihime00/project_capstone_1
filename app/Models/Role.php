<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public const ADMIN = 'admin';
    public const MAHASISWA = 'mahasiswa';
    public const KAPRODI = 'kaprodi';
    public const MANAJER = 'manajer';
}
