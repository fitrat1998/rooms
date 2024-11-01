<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'floor_id',
        'number',
        'comment',
    ];


    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function beds()
    {
        return $this->hasMany(Beds::class);
    }


    public function visit($id)
    {
        $visit = Visit::where('bed_id',$id)
            ->where('status','empty')
            ->first();

        return $visit;
    }

    public function guest($id)
    {
        $guest = Guest::find($id);
        return $guest;
    }

}
