<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory; 

    protected $table = 'people'; 

    protected $fillable = ['name',
                           'last_name',
                           'identifier',
                           'phone',
                           'type',
                           'address',
                           'email'];
}
