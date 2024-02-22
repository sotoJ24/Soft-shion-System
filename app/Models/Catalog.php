<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Supplier;

class Catalog extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_code',
        'article_name',
        'article_price',
        'quantity',
        'size',
        'description',
        'image',
        'supplier_id'
    ];

    public function articlesCategory()
    {
        return $this->belongsToMany(Category::class, 'article_category', 'article_id', 'category_id')->withTimestamps();
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

}
