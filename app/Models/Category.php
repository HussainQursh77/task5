<?php

namespace App\Models;

use App\Models\Parentc;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Category extends Model
{
    use HasFactory;
    use HasRoles;


    protected $fillable = [
        'name',
        'parentc_id'
    ];

    public function parentc()
    {
        return $this->belongsTo(Parentc::class);
    }
    // public function boks()
    // {
    //     return $this->hasMany(Book::class);
    // }
}
