<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'last_name', 'bio', 'image_link', 'user_id'];
    protected $appends = ['authorbook'];

    protected $hidden = [

        'created_at',
        'updated_at',
        'books',
    ];



    public function getAuthorbookAttribute()
    {
        return  $this->books;

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
