<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Book extends Model
{
    use HasFactory;
    use HasRoles;

    protected $fillable = [
        'title',
        'author',
        'price',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // public function user()
    // {
    //     return $this->belongsToMany(User::class);
    // }
    // public function ratebook()
    // {
    //     return $this->belongsToMany(User::class, 'ratebook');
    // }

}
