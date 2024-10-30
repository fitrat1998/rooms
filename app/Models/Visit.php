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


    public function guests()
    {
        return $this->hasMany(Guest::class);
    }

}
