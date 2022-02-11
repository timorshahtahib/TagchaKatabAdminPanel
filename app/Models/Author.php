<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'last_name', 'bio', 'image_link', 'user_id'];
   protected $appends = ['image'];

    protected $hidden = [

        'created_at',
        'updated_at',
        'image_link',
        'user_id',

    ];



    public function getImageAttribute()
    {
        return asset('storage/images/author_image/' . $this->download_link);

    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }


    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
