<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Exam;
use App\Models\QuestionList;
use App\Models\Questions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    //
    public function index($id)
    {

        $user = Auth::user();

        if ($user->role === 'lecturer') {
            $data = Classroom::with(['exam', 'subject'])->findOrFail($id);
        } else {
            $userid = $user->id;
            $data = Classroom::with(['subject', 'exam.student_answers' => function ($query) use ($userid) {
                $query->where('user_id', $userid);
            }])->findOrFail($id);
        }
        $exam = $data->exam;
        $subjects = $data->subject;



        return view('teacher.exam.index', compact('data', 'subjects', 'exam'));
    }

    public function create(Request $req)
    {

        Exam::create($req->all());

        return redirect()->route('exam.index', ['id' => $req->classroom_id])->with('success', 'Class created!');
    }

    public function question($id)
    {



        $data = Exam::with(['questions.questionlist'])->findOrFail($id);

        return view('teacher.exam.question', compact('data'));
    }

    public function createQuestion(Request $req)
    {

        $question = Questions::create([
            'exam_id' => $req->exam_id,
            'soalan' => $req->soalan,
            'type' => $req->type, // Pastikan ada kolum 'type' dalam table questions
        ]);

        if ($req->type === 'multiple') {
            foreach ($req->jawapan as $key => $teks) {

                if ($teks) {

                    QuestionList::create([

                        'question_id' => $question->id,
                        'jawapan' => $teks,
                        'pilihan' => $key,
                        'is_correct' => ($req->is_correct === $key)

                    ]);
                }
            }
        }


        return redirect()->route('exam.question', ['id' => $req->exam_id])->with('success', 'success');
    }
}
