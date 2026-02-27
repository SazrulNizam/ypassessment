<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    /** @use HasFactory<\Database\Factories\ExamFactory> */
        protected $fillable = ['name', 'subject_id', 'classroom_id'];

    use HasFactory;

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

       public function questions()
    {
        return $this->hasMany(Questions::class, 'exam_id');
    }

    public function student_answers()
    {
        return $this->hasMany(StudentAnswer::class, 'exam_id');
    }
}
