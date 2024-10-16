<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'comment',
        'deadline',
        'process',
    ];

    public function faculties()
    {
        return $this->belongsToMany(Faculty::class, 'tasks_has_faculties', 'task_id', 'faculty_id');
    }

    public function files()
    {
       return $this->hasMany(TaskHasFile::class, 'task_id', 'id');
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


}
