<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\http\Controllers\ExamController;
use \App\http\Controllers\SubjectController;
use \App\http\Controllers\ClassController;
use \App\http\Controllers\StudentexamController;
use \App\http\Controllers\AssignController;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

$user = Auth::user();

if ($user->role == 'lecturer') {
        $classes = Classroom::withCount('user')->get();
    } else {
       
        $classes = $user->Classes()->withCount('user')->get();
    }

    return view('dashboard', compact('classes'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/lecturer/exam/index/{id}', [ExamController::class, 'index'])->name('exam.index');

});

Route::get('/form', function () {
    return view('form.dropdown');
});

// Route Lecturer
Route::middleware(['auth', 'role:lecturer'])->group(function () {

//Subject
    Route::get('/lecturer/subject/index', [SubjectController::class, 'index'])->name('subject.index');
    Route::post('/subject/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::delete('/subject/{id}', [SubjectController::class, 'delete'])->name('subject.delete');
    Route::get('/edit/subject/{id}', [SubjectController::class, 'show'])->name('subject.show');
     Route::put('/edit/subject/{id}', [SubjectController::class, 'edit'])->name('subject.edit');

    //Class
        Route::get('/lecturer/class/index', [ClassController::class, 'index'])->name('class.index');
     Route::post('/class/create', [ClassController::class, 'create'])->name('class.create');
    Route::delete('/class/{id}', [ClassController::class, 'delete'])->name('class.delete');
    Route::get('/edit/class/{id}', [ClassController::class, 'show'])->name('class.show');
     Route::put('/edit/class/{id}', [ClassController::class, 'edit'])->name('class.edit');

    //Exam
    Route::post('/exam/create', [ExamController::class, 'create'])->name('exam.create');
    Route::post('/exam/create-question', [ExamController::class, 'createQuestion'])->name('exam.create-question');
    Route::get('/lecturer/exam/question/{id}', [ExamController::class, 'question'])->name('exam.question');

    //AssignStudent
    Route::get('/lecturer/class/assign-student/{id}', [AssignController::class, 'IndexStudent'])->name('assign-student.index');
    Route::get('/lecturer/class/assign-subject/{id}', [AssignController::class, 'IndexSubject'])->name('assign-subject.index');
    Route::post('/assign-student/{id}', [AssignController::class, 'PostStudent'])->name('post-user.index');
    Route::post('/assign-subject/{id}', [AssignController::class, 'PostSubject'])->name('post-subject.index');
    Route::delete('/remove-student/{id}', [AssignController::class, 'RemoveStudent'])->name('remove-user.index');
    Route::delete('/remove-subject/{id}', [AssignController::class, 'RemoveSubject'])->name('remove-subject.index');



});

// Route student
Route::middleware(['auth', 'role:student'])->group(function () {
    
    Route::get('/student/index/{id}', [StudentexamController::class, 'index'])->name('student.index');
    Route::post('/student/submit', [StudentexamController::class, 'submit'])->name('exam.submit');

});


require __DIR__.'/auth.php';
