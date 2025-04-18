<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserSchool;

class TeacherController extends Controller
{
    public function index()
    {
        return view('pages.teachers.index');
    }

    public function show($id)
    {
        return view('pages.teachers.show', [
            'teacher' => $id
        ]);
    }
    public function create(Request $request)
    {   
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255',
            'school_id' => 'required|exists:schools,id',
        ]);
        $teacher = User::create([
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'school_id' => $validated['school_id'],
        ]);

        UserSchool::create([
            'user_id' => $teacher->id,
            'school_id' => $teacher->school_id,
            'role' => 'teacher',
        ]);
        // $teacher->last_name = $request->input('last_name');
        // $teacher->first_name = $request->input('first_name');
        // $teacher->email = $request->input('email');
        // $teacher->password = bcrypt($request->input('password'));
        // $teacher->role = 'teacher';
        return redirect()->route('teacher.index')->with('success', 'Teacher created successfully.');
    }

    public function destroy($id)
    {
        return redirect()->route('teacher.index')->with('success', 'Teacher deleted successfully.');
    }
}
