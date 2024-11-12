<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingMenu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'ID_jenis_user', 'ID_jenis_user');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'ID_menu', 'id');
    }
}
