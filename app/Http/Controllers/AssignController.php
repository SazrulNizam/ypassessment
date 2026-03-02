<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classroom;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class AssignController extends Controller
{
    //

    public function IndexStudent($id)
    {
        $user = Auth::user();
        $assigned = Classroom::with('user')->findOrFail($id);

        $availableUser = User::where('role', 'student')->whereNotIn('id', $assigned->user->pluck('id'))->get();

        return view('teacher.class.assign-student', compact('assigned', 'availableUser'));
    }

    public function IndexSubject($id)
    {

        $assigned = Classroom::with('subject')->findOrFail($id);

        $availableSubject = Subject::whereNotIn('id', $assigned->subject->pluck('id'))->get();

        return view('teacher.class.assign-subject', compact('assigned', 'availableSubject'));
    }


    public function PostStudent(Request $req, $id)
    {

        $classroom = Classroom::findOrFail($id);



        $classroom->user()->attach($req->user_id);

        return redirect()->back()->with('success', 'Table pivot kini sudah berisi!');
    }

    public function RemoveStudent(Request $req, $id)
    {

        $classroom = Classroom::findOrFail($id);



        $classroom->user()->detach($req->user_id);

        return redirect()->back()->with('success', 'Table pivot kini sudah dibuang!');
    }


    public function PostSubject(Request $req, $id)
    {

        $classroom = Classroom::findOrFail($id);



        $classroom->subject()->attach($req->subject_id);

        return redirect()->back()->with('success', 'Table pivot kini sudah berisi!');
    }

    public function RemoveSubject(Request $req, $id)
    {

        $classroom = Classroom::findOrFail($id);



        $classroom->subject()->detach($req->subject_id);

        return redirect()->back()->with('success', 'Table pivot kini sudah dibuang!');
    }
}
