<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * Get the book that owns the Review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function books()
    {
        return $this->belongsTo(Books::class, 'id');
    }
}


