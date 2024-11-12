<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUser extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'jenis_users';
    protected $primaryKey = 'ID_jenis_user';  // Sesuaikan dengan primary key di tabel

    // Tambahkan kolom yang dapat diisi (fillable) jika diperlukan
    protected $fillable = ['jenis_user'];

    public function users()
    {
        return $this->hasMany(User::class, 'ID_jenis_user', 'ID_jenis_user');
    }

    
}
