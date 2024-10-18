<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizenship extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',

    ];


    public function guests()
    {
        return $this->hasMany(Guest::class, 'citizenship_id');
    }
}
