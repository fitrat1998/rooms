<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beds extends Model
{
    use HasFactory;

    protected  $fillable = ['room_id','number','status'];

        public function room()
        {
            return $this->belongsTo(Room::class);
        }



    public function building($id)
    {
        $building = Building::find($id);

        return $building->name ?? 'mavjud emas';
    }

}
