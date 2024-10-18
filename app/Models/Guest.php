<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'citizenship_id',
        'passport_number',
    ];

    public function citizenship()
    {
        return $this->belongsTo(Citizenship::class, 'citizenship_id');
    }
}
