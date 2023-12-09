<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_name','description'];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_category', 'article_id', 'category_id')->withTimestamps();
    }
}
