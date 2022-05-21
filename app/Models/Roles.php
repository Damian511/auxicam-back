<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $fillable = ['rolid','descripcion','estadoid'];
    protected  $primaryKey = 'rolid';
    public $timestamps = false;
    
    public function estado()
    {
        return $this->hasOne('App\Models\Estados','estadoid','estadoid');
    }
}
