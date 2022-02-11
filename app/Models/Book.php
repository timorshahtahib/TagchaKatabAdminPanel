<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'body', 'download_link', 'image_link', 'sub_category_id', 'language', 'size', 'is_hot', 'another_language', 'another_language_text', 'author_id', 'page', 'user_id'];
    protected $appends = ['downloadbook', 'downloadpic','sab_name','authorr'];
    protected $hidden = [
        'download_link',
        'image_link',
        'created_at',
        'updated_at',
        'user_id',

    ];


    public function getAuthorrAttribute()
    {



      return $this->author->name;

    }
    public function getSabNameAttribute()
    {



    //    return Category::where('id',$this->SubCategory->id)->orderBy('created_at', 'asc')->first();
      return $this->SubCategory->category->name;

    }

    public function getDownloadbookAttribute()
    {
        return asset('storage/books/' . $this->download_link);

    }

    public function getDownloadpicAttribute()
    {
        return asset('storage/images/book_image/' . $this->image_link);

    }

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
