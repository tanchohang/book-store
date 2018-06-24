<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use Searchable;

    protected $fillable=["title","description","isbn","author","imgUrl","price"];

    public function searchableAs()
    {
        return 'books_title';
    }
}
