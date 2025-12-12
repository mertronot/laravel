<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Uye extends Authenticatable
{
    use Notifiable;

    protected $table = 'uyeler';

    protected $fillable = [
        'ad',
        'soyad',
        'e_posta',
        'parola',
        'yetki'
    ];

    public function getAuthPassword()
    {
        return $this->parola;
    }
}
