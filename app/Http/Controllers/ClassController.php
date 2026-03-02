<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassController extends Controller
{
   //
   public function index()
   {

      $data = Classroom::latest()->get();

      return view('teacher.class.index', compact('data'));
   }

   public function create(Request $req)
   {

      Classroom::create($req->all());

      return redirect()->route('class.index')->with('success', 'Class created!');
   }

   public function show($id)
   {

      $data = Classroom::findOrFail($id);

      return view('teacher.class.editshow', compact('data'));
   }

   public function edit(Request $req, $id)
   {

      $class = Classroom::findOrFail($id);

      $class->update($req->all());

      return redirect()->route('class.index')->with('message', 'success');
   }

   public function delete($id)
   {

      $delete = Classroom::findOrFail($id);
      $delete->delete();

      return redirect()->route('class.index')->with('messsage', 'deleted');
   }
}
