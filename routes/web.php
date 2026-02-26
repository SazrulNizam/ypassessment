<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\http\Controllers\ExamController;
use \App\http\Controllers\SubjectController;
use \App\http\Controllers\ClassController;
use \App\http\Controllers\StudentexamController;
use \App\http\Controllers\AssignController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/form', function () {
    return view('form.dropdown');
});

// Route untuk Lecturer sahaja
Route::middleware(['auth', 'role:lecturer'])->group(function () {

Route::get('/alpine', function () {
    return view('alpine');
});
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
    Route::get('/lecturer/exam/index', [ExamController::class, 'index'])->name('exam.index');
    Route::get('/lecturer/exam/formexam', [ExamController::class, 'form'])->name('exam.form');
    Route::post('/exam/create', [ExamController::class, 'create'])->name('exam.create');
    Route::get('/lecturer/exam/question', [ExamController::class, 'form'])->name('exam.question');
    Route::post('/exam/create-question', [ExamController::class, 'form'])->name('exam.create-qquestion');


    //AssignStudent
    Route::get('/lecturer/class/assign-student/{id}', [AssignController::class, 'IndexStudent'])->name('assign-student.index');
    Route::get('/lecturer/class/assign-subject/{id}', [AssignController::class, 'IndexSubject'])->name('assign-subject.index');
    Route::post('/lecturer/class/post-subject/{id}', [AssignController::class, 'PostStudent'])->name('post-subject.index');



});

// Route untuk Student sahaja
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/exam', [StudentexamController::class, 'exam'])->name('student.exam');
    Route::get('/student/index', [StudentexamController::class, 'index'])->name('student.index');

});

require __DIR__.'/auth.php';
