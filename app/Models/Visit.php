<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_id',
        'position',
        'reason',
        'tarif',
        'visa',
        'visa_period',
        'registration',
        'registration_period',
        'bed_id',
        'comment',
        'arrive',
        'leave',
        'status',
    ];


    public function building($id)
    {
        $building = Building::find($id);

        return 1;
    }

    public function bed($id)
    {
        $bed = Beds::find($id);

        return $bed;
    }

     public function room($id)
    {
        $room = Room::find($id);

        return $room;
    }


}
