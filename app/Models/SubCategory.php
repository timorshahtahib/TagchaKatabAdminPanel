<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable=['name','description','image_link','category_id','user_id'];
    protected $hidden = [
        'created_at',
        'updated_at',
        'user_id',
        'description',


    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public  function books(){
      return  $this->belongsToMany(Book::class);
    }
}
