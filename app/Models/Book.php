<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',
        'author_id',
        'short',
        'pages'
        ];

    public function getAuthorName()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
}
