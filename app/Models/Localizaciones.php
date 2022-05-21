<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizaciones extends Model
{
    protected $table = 'localizaciones';
    protected $fillable = ['localizacionid','dispositivoid','latitud','longitud','fechahora','bateria','estadoid'];
    protected  $primaryKey = 'localizacionid';
    public $timestamps = false;

    public function dispositivo()
    {
        return $this->hasOne('App\Models\Dispositivos','dispositivoid','dispositivoid');
    }

    public function estado()
    {
        return $this->hasOne('App\Models\Estados','estadoid','estadoid');
    }
}
