<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objects extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    public function floors()
    {
        return $this->hasMany(Floor::class, 'objects_id', 'id');
    }

    public function flats()
    {
        return $this->hasMany(Flat::class, 'object_id', 'id');
    }
}
