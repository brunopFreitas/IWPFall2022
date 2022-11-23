<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory;
    use SoftDeletes;

    function languages(){
        return $this->belongsToMany(Language::class);
    }

    function country(){
        return $this->belongsTo(Country::class);
    }
}
