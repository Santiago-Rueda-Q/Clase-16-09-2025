<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'synopsis',
        'publication_year',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
