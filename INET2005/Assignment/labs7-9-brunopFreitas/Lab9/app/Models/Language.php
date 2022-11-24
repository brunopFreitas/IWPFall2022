<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use HasFactory;
    use SoftDeletes;

    function people(){
        return $this->belongsToMany(Person::class);
    }

    function createdBy() {
        return $this->belongsTo(User::class, 'created_by');
    }

    function deletedBy() {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
