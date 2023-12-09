<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;
use App\Http\Traits\modelchildMethods;

class Employee extends Person
{
    use modelchildMethods;
}
