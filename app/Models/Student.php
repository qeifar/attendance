<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";

    protected $fillable = [
        'name',
        'email',
        'phone_no',
        'facebook',
        'course_id',
        'group_id',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_courses');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'student_groups');
    }

    public function attends()
    {
        return $this->hasMany(Attend::class);
    }
}
