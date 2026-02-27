<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    /** @use HasFactory<\Database\Factories\ClassroomFactory> */
    use HasFactory;

        protected $fillable = ['name'];

        public function subject(){

        return $this->belongsToMany(
        Subject::class,
        'classroomsubjects',
        'classroom_id',
        'subject_id'

        );
        }

         public function user(){

        return $this->belongsToMany(
        User::class,
        'student_classes',
        'classroom_id',
        'user_id',
        
        );
        }

         public function exam()
    {
        return $this->hasMany(Exam::class);
    }

}
