<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;

            protected $fillable = ['name'];
 public function Classroom(){

        return $this->belongsToMany(
        Classroom::class,
        'Classroomsubject',
        'subject_id',
        'classroom_id',
        
        );
        }

}
