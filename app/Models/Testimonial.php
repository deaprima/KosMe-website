<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'boarding_house_id',
        'photo',
        'name',
        'content',
        'rating'
    ];

    public function BoardingHouse()
    {
        return $this->belongsTo(boardingHouse::class);
    }
}

