<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classroom;

class AssignController extends Controller
{
    //

    public function IndexStudent($id){

    $assigned = Classroom::with('user')->findOrFail($id);
    
    // Ambil subjek yang ID-nya TIADA dalam list subjek kelas ni
    $availableUser = User::where('role','student')->whereNotIn('id', $assigned->user->pluck('id'))->get();

       return view('teacher.class.assign-student',compact('assigned','availableUser'));
    }
}
