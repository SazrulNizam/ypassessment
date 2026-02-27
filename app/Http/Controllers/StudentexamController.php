<?php

namespace App\Http\Controllers;
use App\Models\Classroom;
use App\Models\Exam;
use App\Models\StudentAnswer;
use Illuminate\Support\Facades\Auth;
use App\Models\QuestionList;
use App\Models\Questions;
use Illuminate\Http\Request;

class StudentexamController extends Controller
{
    //

    public function index($id){

    $data = Exam::with(['questions.questionlist'])->findOrFail($id);    


    return view('student.index', compact('data'));

    }

    public function submit(Request $req){

    if ($req->has('answers')) {
        foreach($req->answers as $question_id => $student_answer) {
            $user = Auth::user();

            StudentAnswer::create([
                'user_id'     => $user->id,    
                'exam_id'     => $req->exam_id,   
                'question_id' => $question_id,    
                'answer_text' => $student_answer, 
            ]);
        }
    }

        return redirect()->route('exam.index', ['id' => $req->classroom_id])->with('success', 'success');


    }
}
