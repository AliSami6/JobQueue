<?php

namespace App\Http\Controllers;

use App\Events\StudentEvent;
use App\Models\Student;

use Illuminate\Http\Request;
use App\Jobs\StudentRegister;


class StudentController extends Controller
{
    public function index()
    {
        $student = Student::all();
        return view('student.index', compact('student'));
    }
    public function create()
    {
        return view('student.create');
    }
    public function store(Request $request)
    {
        $student = new Student();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->course = $request->input('course');
        $student->section = $request->input('section');
        $student->save();
        return redirect()
            ->back()
            ->with('status', 'Student Added Successfully');
    }
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student'));
    }
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->course = $request->input('course');
        $student->section = $request->input('section');
        $student->update();
        return redirect()
            ->back()
            ->with('status', 'Student Updated Successfully');
    }
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()
            ->back()
            ->with('status', 'Student Deleted Successfully');
    }
    public function queue(){
        return view('student.queue');
    }
    public function QueueStore(Request $request){
        event(new StudentEvent($request->all()));
        return back()->with('status','Mail send successfully.');
    }
}
