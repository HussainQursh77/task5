<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Rate extends Model
{
    use HasFactory;
    use HasRoles;

    protected $fillable = [
        'book_id',
        'user_id',
        'rating',
    ];
}
