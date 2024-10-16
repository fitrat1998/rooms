<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_id',
        'floor_id',
        'number',
        'surface'
    ];

    public function objects()
    {
        return $this->belongsToMany(Objects::class, 'object_table', 'flat_id', 'objects_id');
    }
}
