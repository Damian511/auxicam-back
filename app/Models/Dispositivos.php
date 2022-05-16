<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivos extends Model
{
    protected $table = 'dispositivos';
    protected $fillable = ['dispositivoid','simcardid','mascotaid','estadoid'];
    protected  $primaryKey = 'dispositivoid';
    public $timestamps = false;
    public function mascota()
    {
        return $this->hasOne('App\Mascotas','mascotaid','mascotaid');
    }
    public function sim()
    {
        return $this->hasOne('App\SimCards','simcardid','simcardid');
    }
    public function estado()
    {
        return $this->hasOne('App\Estadod','estadoid','estadoid');
    }

}
