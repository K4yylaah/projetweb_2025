<?php

use App\Http\Controllers\CohortController;
use App\Http\Controllers\CommonLifeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RetroController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

// Redirect the root path to /dashboard
Route::redirect('/', 'dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/delete', [ProfileController::class, 'delete'])->name('profile.delete');
    Route::post('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('verified')->group(function () {
            // Dashboard
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

            // Cohorts
            Route::get('/cohorts', [CohortController::class, 'index'])->name('cohort.index');
            Route::get('/cohort/{cohort}', [CohortController::class, 'show'])->name('cohort.show');
            Route::post('/cohort/store', [CohortController::class, 'store'])->name('cohort.store');
            Route::delete('/cohorts/{cohort}', [CohortController::class, 'destroy'])->name('cohort.destroy');
            Route::post('/cohorts/{cohort}', [CohortController::class, 'update'])->name('cohort.update');
            // Teachers
            Route::get('/teachers', [TeacherController::class, 'index'])->name('teacher.index');
            Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->name('teacher.show');
            Route::post('/teachers/create', [TeacherController::class, 'create'])->name('teacher.create');
            Route::post('/teachers/store', [TeacherController::class, 'store'])->name('teacher.store');
            Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
            Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
            Route::patch('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
    
            // Students
            Route::get('students', [StudentController::class, 'index'])->name('student.index');
            Route::get('students/{student}', [StudentController::class, 'show'])->name('student.show');
            Route::post('students/store', [StudentController::class, 'store'])->name('student.store');
            Route::delete('students/{student}', [StudentController::class, 'destroy'])->name('student.destroy');
    
            // Knowledge
            Route::get('knowledge', [KnowledgeController::class, 'index'])->name('knowledge.index');
    
            // Groups
            Route::get('groups', [GroupController::class, 'index'])->name('group.index');
    
            // Retro
            route::get('retros', [RetroController::class, 'index'])->name('retro.index');
    
            // Common life
            Route::get('common-life', [CommonLifeController::class, 'index'])->name('common-life.index');
        });
});

require __DIR__.'/auth.php';