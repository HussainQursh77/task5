<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Parentc extends Model
{
    use HasFactory;
    use HasRoles;

    protected $fillable = [
        'name',
    ];

    // public function categories()
    // {
    //     return $this->hasMany(Category::class);
    // }
    // public function books()
    // {
    //     return $this->hasManyThrough(Book::class, Category::class);
    // }
}
