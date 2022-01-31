<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'last_name', 'bio', 'image_link', 'user_id'];


    public function User()
    {
        return $this->belongsTo(User::class);
    }


    public function books(){
        return $this->belongsToMany(Book::class);
    }
}
