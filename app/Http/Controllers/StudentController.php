<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index()
    {

        $students = Student::OrderBy('id', 'DESC')->get();
        return view('student.index', compact('students'));
    }

    public function addStudent(Request $request)
    {

        $student = new Student();

        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->contact = $request->contact;

        $student->save();
        return response()->json($student);
    }

    public function getStudentById($id)
    {

        $student = Student::find($id);

        return response()->json($student);
    }

    public function updateStudent(Request $request)
    {

        $student = Student::find($request->id);

        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->contact = $request->contact;

        $student->save();

        return response()->json($student);
    }

    public function delete($id){

        $student = Student::find($id)->delete();

       // $student->delete();

        return response()->json(['success'=>'Record Deleted Successfully.']);
    }

    public function bulkdelete(Request $request){

        $ids = $request->ids;
        Student::whereIn('id',$ids)->delete();
        return response()->json(['success'=>"Students have been deleted."]);
    }
}
