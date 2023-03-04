<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    /**
     * Get all of the books for the Author
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function book()
    {
        return $this->hasMany(Book::class, 'auth_id');
    }
}
