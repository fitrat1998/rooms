<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $fillable = [
        'objects_id',
        'number',
        'surface'
    ];



    public function objects()
    {
        return $this->belongsToMany(Objects::class, 'object_floor', 'floor_id', 'object_id');
    }



}
