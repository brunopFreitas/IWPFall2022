<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    function languages(){
        return $this->belongsToMany(Language::class);
    }

    function country(){
        return $this->belongsTo(Country::class);
    }
}
