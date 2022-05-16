<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    protected $table = 'estados';
    protected $fillable = ['estadoid','descripcion','activo'];
    protected  $primaryKey = 'estadoid';
    public $timestamps = false;
}
