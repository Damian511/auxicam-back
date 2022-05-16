<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascotas extends Model
{
    protected $table = 'mascotas';
    protected $fillable = ['mascotaid','nombre','raza','edad','estadoid'];
    protected  $primaryKey = 'mascotaid';
    public $timestamps = false;
}
