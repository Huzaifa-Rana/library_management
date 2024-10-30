<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    // Define fillable attributes for mass assignment
    protected $fillable = ['book_id', 'renter_name', 'rented_at', 'returned_at'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    protected $casts = [
        'rented_at' => 'datetime',
        'returned_at' => 'datetime',
    ];
}
