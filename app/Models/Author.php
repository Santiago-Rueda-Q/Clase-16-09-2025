<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'birth_date',
        'biography',
    ];

    protected $casts = [
        'birth_date'=> 'date',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
