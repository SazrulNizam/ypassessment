<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
  //
  //
  public function index()
  {

    $data = Subject::latest()->get();

    return view('teacher.subject.index', compact('data'));
  }

  public function create(Request $req)
  {

    Subject::create($req->all());

    return redirect()->route('subject.index')->with('success', 'Class created!');
  }

  public function show($id)
  {

    $data = Subject::findOrFail($id);

    return view('teacher.subject.editshow', compact('data'));
  }

  public function edit(Request $req, $id)
  {

    $subject = Subject::findOrFail($id);

    $subject->update($req->all());

    return redirect()->route('subject.index')->with('message', 'success');
  }

  public function delete($id)
  {

    $delete = Subject::findOrFail($id);
    $delete->delete();

    return redirect()->route('subject.index')->with('messsage', 'deleted');
  }
}
