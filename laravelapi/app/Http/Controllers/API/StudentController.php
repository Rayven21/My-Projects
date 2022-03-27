<?php

namespace App\Http\Controllers\API;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();
        return response()->json([
            'status' => 200,
            'students'=>$students,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request-> all(),[
            'name' => 'required',
            'course' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:11',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'validate_error'=>$validator->messages(),
            ]);
        }
        else
        {
            $student = new Student;
            $student->name = $request->input('name');
            $student->course = $request->input('course');
            $student->email = $request->input('email');
            $student->phone = $request->input('phone');
            $student->save();
    
            return response()->json([
                'status'=> 200,
                'message'=> 'Student Added Successfully',
            ]);
        }
       
    }

    public function edit($id)
    {
        $student = Student::find($id);
        if($student)
        {
            return response()->json([
                'status'=> 200,
                'student'=> $student,
            ]);
        }
        else
        {
            return response()->json([
                'status'=> 404,
                'message'=> "No Student ID Found",
            ]);
        }
       
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request-> all(),[
            'name' => 'required',
            'course' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:11',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'validate_error'=>$validator->messages(),
            ]);
        }
        else
        {
            $student = Student::find($id);
            if($student)
            {
                $student->name = $request->input('name');
                $student->course = $request->input('course');
                $student->email = $request->input('email');
                $student->phone = $request->input('phone');
                $student->update();

                return response()->json([
                    'status'=> 200,
                    'message'=> 'Student Updated Successfully',
                ]);
            }
            else
            {
                return response()->json([
                    'status'=> 404,
                    'message'=> "No Student ID Found",
                ]);
            }
            
        }
    }

    public function destroy ($id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            'status'=> 200,
            'message'=> 'Student Deleted Successfully',
        ]);
    }
}
