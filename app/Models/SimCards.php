<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimCards extends Model
{
    protected $table = 'simcards';
    protected $fillable = ['simcardid','estadoid'];
    protected  $primaryKey = 'simcardid';
    public $timestamps = false;
}
