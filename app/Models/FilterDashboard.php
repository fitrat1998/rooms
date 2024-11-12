<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterDashboard extends Model
{
    use HasFactory;

      protected $fillable = [
        'guest_id',
        'position',
        'reason',
        'tarif',
        'visa',
        'visa_start',
        'visa_end',
        'registration',
        'registration_start',
        'registration_end',
        'bed_id',
        'comment',
        'arrive',
        'leave',
        'status',
    ];


}
