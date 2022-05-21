<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimCards extends Model
{
    protected $table = 'simcards';
    protected $fillable = ['simcardid','numero','estadoid'];
    protected  $primaryKey = 'simcardid';
    public $timestamps = false;
    
    public function estado()
    {
        return $this->hasOne('App\Models\Estados','estadoid','estadoid');
    }
}
