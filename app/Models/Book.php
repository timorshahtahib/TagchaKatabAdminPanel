<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'body', 'download_link', 'image_link', 'sub_category_id', 'language', 'size', 'is_hot', 'another_language', 'another_language_text', 'author_id', 'page', 'user_id'];

    public function SubCategory()
    {

        return $this->belongsTo(SubCategory::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
