<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klant extends Model
{
    public $timestamps = false;
    protected $table = 'klant';
    protected $fillable = ['naam', 'achternaam', 'adres', 'postcode', 'email', 'wachtwoord', 'verzendwijze'];

}
