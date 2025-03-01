<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_id',
        'number',
        'photo'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
