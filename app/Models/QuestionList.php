<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class QuestionList extends Model
{
    //
     protected $fillable = ['jawapan','pilihan', 'is_correct','question_id'];

    use HasFactory;

    public function question()
    {
        return $this->belongsTo(Questions::class);
    }

}
