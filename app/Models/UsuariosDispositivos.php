<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariosDispositivos extends Model
{
    protected $table = 'usuariosdispositivos';
    protected $fillable = ['dispositivoid','usuarioid'];
    protected  $primaryKey = 'dispositivoid';
    public $timestamps = false;
}
