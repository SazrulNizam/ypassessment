<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;

            protected $fillable = ['name'];

 public function classroom(){

        return $this->belongsToMany(
        Classroom::class,
        'classroomsubjects',
        'subject_id',
        'classroom_id',
        
        );
        }

             public function exam()
    {
        return $this->hasMany(Exam::class);
    }
}
