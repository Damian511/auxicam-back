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
        return $this->hasOne('App\Models\Mascotas','mascotaid','mascotaid');
    }
    public function sim()
    {
        return $this->hasOne('App\Models\SimCards','simcardid','simcardid');
    }
    public function estado()
    {
        return $this->hasOne('App\Models\Estados','estadoid','estadoid');
    }

}
