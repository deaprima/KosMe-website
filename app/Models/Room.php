<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'boarding_house_id',
        'name',
        'room_type',
        'capacity',
        'square_feet',
        'price_per_month',
        'is_available'
    ];

    public function BoardingHouse()
    {
        return $this->belongsTo(boardingHouse::class);
    }

    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
