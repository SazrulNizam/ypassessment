<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionsFactory> */
      protected $fillable = ['soalan', 'type', 'is_correct','exam_id'];

    use HasFactory;

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

              public function questionlist()
    {
        return $this->hasMany(QuestionList::class, 'question_id');
    }

   public function student_answers()
    {
        return $this->hasMany(StudentAnswer::class, 'question_id');
    }
}
