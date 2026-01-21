<?php

namespace Modules\Library\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Library\Database\Factories\BookFactory;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
protected $fillable = [
        'title',
        'author',
        'isbn',
        'status'
    ];
    // protected static function newFactory(): BookFactory
    // {
    //     // return BookFactory::new();
    // }
}
