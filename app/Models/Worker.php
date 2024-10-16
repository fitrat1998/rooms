<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'phone',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'worker_id');
    }
}
