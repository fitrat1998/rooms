<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    public function sendtask()
    {
        return $this->belongsTo(SendTask::class)->withDefault();
    }


}
