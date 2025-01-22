<?php

namespace App\Models;

use Carbon\Carbon;
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
//        'room_id',
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


    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function check_deadline_reg($id)
    {
        $visit = Visit::find($id);

        $registrationEnd = Carbon::parse($visit->registration_end);
        $now = Carbon::now();
        $daysLeft = $registrationEnd->diffInDays($now);

        return $daysLeft;

    }


    public function check_deadline_visa($id)
    {
        $visit = Visit::find($id);

        $visaEnd = Carbon::parse($visit->visa_end);
        $now = Carbon::now();
        $daysLeft = $visaEnd->diffInDays($now);

        return $daysLeft;

    }


}
