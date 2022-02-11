<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','description','image_link','user_id'];

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

    public function SubCategory()
    {
        return $this->hasMany(SubCategory::class);
    }
}
