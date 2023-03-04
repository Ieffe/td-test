<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Author;
use App\Models\category;

class Book extends Model
{
    use HasFactory;

    /**
     * Get all of the reviews for the Books
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function review()
    {
        return $this->hasMany(Review::class, 'book_id');
    }

    /**
     * Get the author that owns the Books
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Author::class, 'auth_id');
    }


    /**
     * Get the user that owns the Books
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
