<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'phone_number',
        'email',
        'contact_name',
        'address'
    ];

    public function article()
    {
        return $this->hasMany(Article::class,'supplier_id','id');
    }


}
